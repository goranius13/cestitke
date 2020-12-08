<template>
    <div>
        <div class="gallery m-4">
            <div
                class="gallery-item"
                v-for="card in row1Display"
                :key="card.id"
            >
                <div
                    class="content py-2"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            card.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            card.image_id +
                            `_up.png') left top no-repeat`,
                        backgroundClip: `content-box, content-box`,
                        backgroundSize: `contain, contain`,
                        borderRadius: `8px`
                    }"
                >
                    <CardDisplay v-bind:cardDetails="card" />
                </div>
            </div>
        </div>
        <div>
            aaaaaaaaaaaaaaaaaaaaaaaaa
        </div>
        <div class="gallery m-4">
            <div
                class="gallery-item"
                v-for="card in row2Display"
                :key="card.id"
            >
                <div
                    class="content py-2"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            card.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            card.image_id +
                            `_up.png') left top no-repeat`,
                        backgroundClip: `content-box, content-box`,
                        backgroundSize: `contain, contain`,
                        borderRadius: `8px`
                    }"
                >
                    <CardDisplay v-bind:cardDetails="card" />
                </div>
            </div>
        </div>
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Ovdje postaviti
                    </h1>
                    <h2 class="subtitle">
                        slider s reklamama???
                    </h2>
                </div>
            </div>
        </section>
        <div class="gallery m-4">
            <div
                class="gallery-item"
                v-for="card in row3Display"
                :key="card.id"
            >
                <div
                    class="content py-2"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            card.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            card.image_id +
                            `_up.png') left top no-repeat`,
                        backgroundClip: `content-box, content-box`,
                        backgroundSize: `contain, contain`,
                        borderRadius: `8px`
                    }"
                >
                    <CardDisplay v-bind:cardDetails="card" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardDisplay from "./CardDisplay.vue";

export default {
    name: "Gallery",
    components: {
        CardDisplay
    },
    props: {
        cards: Array
    },
    computed: {
        row1Display: function() {
            return window.innerWidth < 1416
                ? this.cards.slice(0, 3)
                : this.cards.slice(0, 4);
        },
        row2Display: function() {
            return window.innerWidth < 1416
                ? this.cards.slice(3, 6)
                : this.cards.slice(4, 8);
        },
        row3Display: function() {
            return window.innerWidth < 1416
                ? this.cards.slice(6, 9)
                : this.cards.slice(8, 12);
        }
    },
    methods: {
        scroll(person) {
            window.onscroll = () => {
                let bottomOfWindow =
                    document.documentElement.scrollTop + window.innerHeight ===
                    document.documentElement.offsetHeight;

                if (bottomOfWindow) {
                    this.row3Display.push(this.cards.slice(8, 12));
                }
            };
        }
    }
};
</script>

<style>
.gallery {
    display: grid;
    grid-column-gap: 20px;
    grid-row-gap: 20px;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)) !important;
    /*grid-auto-rows: 8px;*/
}
.gallery .card {
    max-width: 100%;
    border-radius: 8px;
    /*box-shadow: 4px 4px 8px #bbb;*/
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
    transition: all 1.5s ease;
    min-height: 350px;
}

.gallery .card:hover {
    /*box-shadow: 8px 8px 16px #bbb;*/
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
}
.gallery .card {
    padding: 4px;
}
.gallery .gallery-item {
    transition: grid-row-start 300ms linear;
    transition: transform 300ms ease;
    transition: all 0.5s ease;
    cursor: pointer;
}
.gallery .gallery-item:hover {
    transform: scale(1.025);
}
.vueAudioBetter {
    width: 200px !important;
}
.vueAudioBetter .operate span:last-child {
    display: none !important;
}
@media (max-width: 600px) {
    .gallery {
        grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
    }
}
@media (max-width: 400px) {
    .gallery {
        grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
    }
}
@-moz-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@-webkit-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@-o-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
</style>
