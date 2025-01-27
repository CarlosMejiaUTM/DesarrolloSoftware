import './bootstrap';
import { createApp } from 'vue';
import MainNavBar from './components/MainNavBar.vue';
import Footer from './components/Footer.vue';

const navbarApp = createApp({});
navbarApp.component('main-nav-bar', MainNavBar);

navbarApp.mount('#main-navbar');

const footerApp = createApp({});
footerApp.component('footer-content', Footer);

footerApp.mount('#footer-content');