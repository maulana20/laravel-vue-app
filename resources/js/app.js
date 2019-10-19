require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('modal', require('./components/ModalComponent.vue').default);
Vue.component('validation-errors', require('./components/ValidationErrorsComponent.vue').default);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
	{ path: '/', redirect: '/dashboard' },
	{ path: '/dashboard', component: require('./components/dashboard/welcome.vue').default },
	{ path: '/blog', component: require('./components/dashboard/blog.vue').default },
	{ path: '/login', component: require('./components/auth/login.vue').default },
	{ path: '/pegawai', component: require('./components/pegawai/index.vue').default },
	{ path: '/pegawai/trash', component: require('./components/pegawai/trash.vue').default }
]

const router = new VueRouter({ routes });
const app = new Vue({
	data: {},
	router
})
app.$mount('#app');
