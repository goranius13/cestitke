import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./VueApp.vue').default
    },
    
    {
        path: '/vjencanja',
        component: require('./VueApp.vue').default
    },
    
    {
        path: '/rodjendani',
        component: require('./VueApp.vue').default
    },
    
    {
        path: '/blagdani',
        component: require('./VueApp.vue').default
    },
    
    {
        path: '/kreiraj',
        component: require('./views/Create.vue').default
    },
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});