import Vue from "vue";
import router from "./router";
import App from "./components/App";
import moment from "moment";
import Vuelidate from "vuelidate";

require("./bootstrap");
Vue.use(Vuelidate);

const app = new Vue({
    el: "#app",
    components: {
        App
    },
    router,
    moment
});
