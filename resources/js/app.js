import "./bootstrap";
import router from './routes'
import { VueFlux, FluxPagination, FluxPreloader } from "vue-flux";

Vue.config.productionTip = false;

window.Event = new Vue();

new Vue({
    el: '#app',
    components: {
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
                "../images/red.png",
                "../images/white.png",
                "../images/green.png"
            ],
            vfTransitions: ["slide"]
        };
    },
    router
});