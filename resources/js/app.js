import "./bootstrap";
import "./config";
import router from "./router/index,js";
import { createApp } from "vue";
import { createPinia } from "pinia";
import PrimeVue from "primevue/config";
const pinia = createPinia();
import App from "./App.vue";
createApp(App).use(pinia).use(router).use(PrimeVue).mount("#root");
