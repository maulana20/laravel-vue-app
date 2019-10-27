<template>
	<div class="container">
		<span class="navbar-brand">V 6.2.0</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation'"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item" v-if="$auth.check()" v-for="(route, key) in routes.admin" v-bind:key="route.path">
					<router-link class="nav-link" :to="{ name : route.path }" :key="key">{{route.name}}</router-link>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
					<router-link class="nav-link" :to="{ name : route.path }" :key="key">{{route.name}}</router-link>
				</li>
				<li v-if="$auth.check()">
					<a href="#" class="nav-link" @click.prevent="$auth.logout()">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</template>
<script>
	export default {
		data: function ()
		{
			return {
				routes: {
					unlogged: [
						{
							name: 'Register',
							path: 'register'
						},
						{
							name: 'Login',
							path: 'login'
						}
					],
					admin: [
						{
							name: 'Home',
							path: 'dashboard',
						},
						{
							name: 'Administration',
							path: 'pegawai'
						},
						{
							name: 'Operational',
							path: 'blog'
						},
						{
							name: 'Accounting',
							path: 'accounting'
						},
						{
							name: 'Finance',
							path: 'finance'
						}
					]
				}
			}
		}
	}
</script>
