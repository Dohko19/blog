require('./bootstrap');

import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

//rutas

let router = new Router({
	routes: [
		{
			path: '/',
			component: require('./views/Home').default
		},
		{
			path: '/nosotros',
			component: require('./views/About').default
		},
		{
			path: '/archivo',
			component:  require('./views/Archive').default
		},
		{
			path: '/contacto',
			component:  require('./views/Contacto').default
		}
	],
	linkExactActiveClass: 'active'
});
const app = new Vue({
	el: '#app',
	router
});
