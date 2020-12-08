import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Home.vue').default
    },
    
    {
        path: '/vjencanja',
        component: require('./views/Weddings.vue').default
    },
    
    {
        path: '/rodjendani',
        component: require('./views/Birthdays.vue').default
    },
    
    {
        path: '/blagdani',
        component: require('./views/Holidays.vue').default
    },
    
    {
        path: '/kreiraj',
        component: require('./views/Create.vue').default
    },
    
    {
        path: '/kontakt',
        component: require('./views/Contact.vue').default
    },
    
    {
        path: '/uvjeti',
        component: require('./views/TermsAndConditions.vue').default
    },
    
    {
        path: '/cestitka/:card_id',
        component: require('./views/SingleCard.vue').default,
        props: true
    },
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});