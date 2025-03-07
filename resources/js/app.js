import './bootstrap';
import './config'
import router from './router/index,js';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
const pinia = createPinia();
import App from './App.vue';
createApp(App).use(pinia).use(router).mount('#root');
