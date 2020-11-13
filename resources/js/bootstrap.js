import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import VueAudio from "vue-audio-better";

window.Vue = Vue;

Vue.use(VueRouter);
Vue.use(VueAudio);

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';




