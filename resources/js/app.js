import "./bootstrap";
import router from './routes'

Vue.config.productionTip = false;

window.Event = new Vue();

new Vue({
    el: '#app',
    router
});