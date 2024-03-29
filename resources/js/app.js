/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
import InstantSearch from 'vue-instantsearch'
import VModal from 'vue-js-modal'

window.md5 = require('md5')
window.Vue = require('vue')
Vue.use(InstantSearch)
Vue.use(VModal)

let authorization = require('./authorization')

Vue.prototype.authorize = function (...params) {
    if(! window.App.signIn) return false

    if(typeof params[0] === 'string'){
        return authorization[params[0]](params[1])
    }

    return params[1](window.App.user)
}

Vue.prototype.$signIn = window.App.signIn

window.events = new Vue()

// level green mean success
window.flash = function (message, status = 'green') {
    window.events.$emit('flash', {message, status})
}
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('VThreadShow', require('./pages/VThreadShow.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
})
