
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.bus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('selected', require('./components/selected.vue'));

Vue.component('searchproduct', require('./components/searchproduct.vue'));

Vue.component('product', require('./components/product.vue'));

Vue.component('CompareItem', require('./components/CompareItem.vue'));

//order

Vue.component('order-treating', require('./components/order/order-treating.vue'));
Vue.component('order-sent', require('./components/order/order-sent.vue'));
Vue.component('order-problem', require('./components/order/order-problem.vue'));
Vue.component('order-pending', require('./components/order/order-pending.vue'));
Vue.component('order-refunded', require('./components/order/order-refunded.vue'));
Vue.component('order', require('./components/order/order.vue'));



if ($('#app').length > 0) {

  const app = new Vue({
      el: '#app'
  });

}
