require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
	{
		path: '/users',
		name: 'userIndex',
		component : require('./components/Users.vue').default
	},
	{
		path: '/user',
		name: 'userView',
		component : require('./components/UserAdd.vue').default
	},
	{
		path: '/user/:id',
		name: 'userEdit',
		component : require('./components/UserEdit.vue').default
	}
]

const router = new VueRouter({ routes });

const app = new Vue({
    router
}).$mount('#app');
