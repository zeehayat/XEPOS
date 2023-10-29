import './bootstrap';
import { createApp } from 'vue'

import router from './router'
import store from './store/index.js'
import App from './App.vue'

createApp(App).use(router, store).mount("#app")




