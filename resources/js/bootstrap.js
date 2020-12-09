import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import VueAudio from 'vue-audio-better';
import VueSocialSharing from 'vue-social-sharing'
import VueClipboard from 'vue-clipboard2'
 
window.Vue = Vue;

window.Vue.prototype.nl2br = function (body) {
    return (body + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br />' + '$2');
}

Vue.use(VueRouter);
Vue.use(VueAudio);
Vue.use(VueSocialSharing);
Vue.use(VueClipboard);

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';




