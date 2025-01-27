import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '@popperjs/core';

// resources/js/bootstrap.js

window.$ = window.jQuery = $;