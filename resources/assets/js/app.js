
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import '../../../public/plugin/ueditor/ueditor.config'
import '../../../public/plugin/ueditor/ueditor.all'
import '../../../public/plugin/ueditor/lang/zh-cn/zh-cn'
import '../../../public/plugin/ueditor/ueditor.parse'

Vue.use(ElementUI)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('admin-index', require('./components/admin/layout/nav.vue'));
Vue.component('admin-layout-nav', require('./components/admin/layout/nav.vue'));
Vue.component('example', require('./components/Example.vue'));


// articles
Vue.component('admin-article-list', require('./components/admin/articles/list.vue'));
Vue.component('admin-article-add', require('./components/admin/articles/form.vue'));




/*Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);*/
const app = new Vue({
    el: '#app'
});
