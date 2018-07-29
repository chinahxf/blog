
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// import { Button, Select ,Table ,DatePicker ,Dropdown ,Form ,Loading ,Collapse} from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
//测试环境
// window.moxie=require('plupload/js/moxie')
// window.plupload=require('plupload/js/plupload.dev')
// import 'plupload/js/moxie.js'
// import 'plupload/js/plupload.dev.js'
// import 'qiniu-js/dist/qiniu.js'
//正式环境
// window.plupload=require('plupload/js/plupload.full.min.js')
// import 'qiniu-js/dist/qiniu.min.js'
window.E=require('wangeditor')
var pub=require('./components/pubfun')
Vue.use(pub)
import Element from 'element-ui';
Vue.use(Element);




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
Vue.component('admin-article-detail', require('./components/admin/articles/detail.vue'));
Vue.component('admin-article-edit', require('./components/admin/articles/form.vue'));
Vue.component('admin-article-category', require('./components/admin/articles/category.vue'));

//message
Vue.component('admin-comment-list', require('./components/admin/comments/list.vue'));
Vue.component('admin-comment-category', require('./components/admin/comments/category.vue'));

//banner
Vue.component('admin-banner-category', require('./components/admin/banners/cagegory/list.vue'));
Vue.component('admin-banner-add', require('./components/admin/banners/form.vue'));
// Vue.component('admin-banner-detail', require('./components/admin/articles/detail.vue'));
Vue.component('admin-banner-edit', require('./components/admin/banners/form.vue'));
Vue.component('admin-banner-list', require('./components/admin/banners/list.vue'));

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
