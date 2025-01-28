import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import '@popperjs/core';

import $ from 'jquery';
window.$ = window.jQuery = $;

import { createApp } from 'vue';
import MainNavBar from './components/MainNavBar.vue';
import Footer from './components/Footer.vue';

const navbarApp = createApp({});
navbarApp.component('main-nav-bar', MainNavBar);

navbarApp.mount('#main-navbar');

const footerApp = createApp({});
footerApp.component('footer-content', Footer);

footerApp.mount('#footer-content');