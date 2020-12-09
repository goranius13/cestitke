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
        path: '/krstenja',
        component: require('./views/Baptism.vue').default
    },
    
    {
        path: '/krizme',
        component: require('./views/Chrism.vue').default
    },
    
    {
        path: '/blagdani',
        component: require('./views/Holidays.vue').default
    },
    
    {
        path: '/ostalo',
        component: require('./views/Miscellaneous.vue').default
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

/*
                <router-link to="/krstenja" class="navbar-item">Krštenja</router-link>
                <router-link to="/krizme" class="navbar-item">Krizme</router-link>
*/

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});