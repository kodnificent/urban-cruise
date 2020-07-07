import VueGlide from "vue-glide-js";

import VueLazyload from 'vue-lazyload';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueLazyload, {
    loading: '/assets/imgs/loading.svg'
})

Vue.use(VueGlide);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        is_shell: [],
        primary_menu: [],
        social_links: [],
        categories: [],
        quick_links: [],
        endpoints: {},
        device_width: null,
    },

    computed: {

        /**
         * Check if the viewport is mobile
         */
        isMobile()
        {
            return this.device_width < 768;
        },

        /**
         * Check if the viewport is tablet
         */
        isTablet()
        {
            return this.device_width >= 768;
        },

        /**
         * Checks if the viewport is desktop
         */
        isDesktop()
        {
            return this.device_width >= 1280;
        },

        /**
         * Check if the view port is a tablet and not a desktop
         */
        isTabletOnly()
        {
            return this.isTablet() && !this.isDesktop();
        }
    },

    mounted(){
        this.device_width = window.outerWidth;
        let $this = this;
        window.addEventListener('resize', function(){
            let width = window.outerWidth;
            $this.device_width = width;
        });
    }
});
