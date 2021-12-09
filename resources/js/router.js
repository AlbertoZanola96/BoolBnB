import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './components/Home';
import Search from './components/Search';
import Show from './components/Show';
import Success from './components/Success';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/search',
            name: 'Search',
            component: Search
        },
        {
            path: '/show/:slug',
            name: 'Show',
            component: Show
        },
        {
            path: '/success',
            name: 'Success',
            component: Success
        }
    ]
});

export default router;
