import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './components/Home';
import Search from './components/Search';
import Show from './components/Show';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/vue/home',
            name: 'Home',
            component: Home
        },
        {
            path: '/vue/search',
            name: 'Search',
            component: Search
        },
        {
            path: '/vue/show/:slug',
            name: 'Show',
            component: Show
        }
    ]
});

export default router;
