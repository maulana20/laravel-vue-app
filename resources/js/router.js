import VueRouter from 'vue-router'

const routes = [
	{ path: '/', name: 'home', component: require('./pages/welcome.vue').default, meta: { auth: undefined } },
	{ path: '/register', name: 'register', component: require('./pages/auth/register.vue').default, meta: { auth: false } },
	{ path: '/login', name: 'login', component: require('./pages/auth/login.vue').default, meta: { auth: false } },
	{ path: '/dashboard', name: 'dashboard', component: require('./pages/home.vue').default, meta: { auth: true } },
	
	{ path: '/blog', name: 'blog', component: require('./pages/pegawai/blog.vue').default, meta: { auth: true } },
	{ path: '/pegawai', name: 'pegawai', component: require('./pages/pegawai/index.vue').default, meta: { auth: true } },
	{ path: '/pegawai/trash', name: 'pegawai.trash', component: require('./pages/pegawai/trash.vue').default, meta: { auth: true } },
	
	{ path: '/settings', name: 'settings', component: require('./pages/settings/index.vue').default, meta: { auth: true } },
	{ path: '/settings/profile', name: 'settings.profile', component: require('./pages/settings/profile.vue').default, meta: { auth: true } },
	{ path: '/settings/password', name: 'settings.password', component: require('./pages/settings/password.vue').default, meta: { auth: true } },
	
	{ path: '*', component: require('./pages/errors/404.vue').default, meta: { auth: undefined } }
]

const router = new VueRouter({
	history: true,
	mode: 'history',
	routes,
});

export default router
