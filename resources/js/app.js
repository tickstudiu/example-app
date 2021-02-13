import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

//Main pages
import App from './views/app.vue'
import Login from './views/login.vue'
import Contact from './views/contact.vue'
import Read from './views/inquiry/read.vue'
import Create from './views/inquiry/create.vue'
import Update from './views/inquiry/update.vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

const app = new Vue({
    el: '#app',
    components: { App, Login, Contact, Read, Create, Update }
});
