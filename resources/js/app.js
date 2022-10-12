import "./bootstrap";

import { createApp } from 'vue/dist/vue.esm-bundler';
import CustomerIndex from "./components/CustomerIndex.vue";
import router from "./router";

createApp({
    components: {
        CustomerIndex,
    },
})
    .use(router)
    .mount("#app");
