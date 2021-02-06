import Vue from 'vue'

//Main pages
import App from './views/app.vue'
import Contact from './views/contact.vue'




const app = new Vue({
    el: '#app',
    components: { App, Contact }
});