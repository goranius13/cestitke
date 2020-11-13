<template>
    <div id="app" class="container">
        <vue-flux
            :options="vfOptions"
            :images="vfImages"
            :transitions="vfTransitions"
            ref="slider"
        >
            <template v-slot:preloader>
                <flux-preloader />
            </template>

            <template v-slot:pagination>
                <flux-pagination />
            </template>
        </vue-flux>

        <Gallery />

        <Footer />
    </div>
</template>

<script>
import Footer from "./components/Footer.vue";
import Gallery from "./components/Gallery.vue";
import { VueFlux, FluxPagination, FluxPreloader } from "vue-flux";

export default {
    name: "VueApp",
    components: {
        Footer,
        Gallery,
        VueFlux,
        FluxPagination,
        FluxPreloader
    },
    data() {
        return {
            vfOptions: {
                autoplay: true,
                aspectRatio: "40:10"
            },
            vfImages: [
                "../images/eronet.jpg",
                "../images/ep.jpg",
                "../images/sretanuskrs.jpg"
            ],
            vfTransitions: ["slide"]
        };
    }
};
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    padding: 10px;
}

.vue-flux {
    border-radius: 8px;
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
}

.vue-flux .complements,
.vue-flux > .flux-image {
    border-radius: 8px;
}

.flux-transition {
    border-radius: 8px;
}

.vue-flux .flux-pagination .pagination-item {
    box-sizing: border-box;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0);
}

.vue-flux .flux-pagination .pagination-item.active,
.vue-flux .flux-pagination .pagination-item:hover {
    border-color: rgba(255, 255, 255, 0.5);
    background-color: rgba(255, 255, 255, 0.5);
}

.vue-flux .flux-pagination li {
    width: 1%;
    padding-bottom: 1%;
}
</style>
