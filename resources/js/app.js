import "./bootstrap";
import "./config";
import router from "./router/index,js";
import { createApp } from "vue";
import { createPinia } from "pinia";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import App from "./App.vue";
const pinia = createPinia();
const app = createApp(App);

app.use(pinia).use(router);
app.component('VueDatePicker', VueDatePicker);  // Register the component here
app.mount("#root");
