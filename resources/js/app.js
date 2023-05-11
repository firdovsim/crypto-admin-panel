import { createApp } from 'vue';

let app= createApp({})
app.component('switcher-component', require('./components/Switcher.vue').default);
app.mount("#app")
