
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
import {
    Pagination,
    Dialog,
    Autocomplete,
    Dropdown,
    DropdownMenu,
    DropdownItem,
    Menu,
    Submenu,
    MenuItem,
    MenuItemGroup,
    Input,
    Radio,
    RadioGroup,
    RadioButton,
    Checkbox,
    CheckboxButton,
    CheckboxGroup,
    Switch,
    Select,
    Option,
    OptionGroup,
    Button,
    ButtonGroup,
    Table,
    TableColumn,
    DatePicker,
    TimeSelect,
    Popover,
    Tooltip,
    Form,
    FormItem,
    Tabs,
    TabPane,
    Tag,
    Tree,
    Alert,
    Icon,
    Row,
    Col,
    Upload,
    Progress,
    Badge,
    Card,
    Steps,
    Step,
    Carousel,
    CarouselItem,
    Collapse,
    CollapseItem,
    Cascader,
    Container,
    Header,
    Aside,
    Main,
    Footer,
    Loading,
    MessageBox,
    Message,
    Notification
} from 'element-ui'

Vue.use(Pagination)
Vue.use(Dialog)
Vue.use(Autocomplete)
Vue.use(Dropdown)
Vue.use(DropdownMenu)
Vue.use(DropdownItem)
Vue.use(Menu)
Vue.use(Submenu)
Vue.use(MenuItem)
Vue.use(MenuItemGroup)
Vue.use(Input)
Vue.use(Radio)
Vue.use(RadioGroup)
Vue.use(RadioButton)
Vue.use(Checkbox)
Vue.use(CheckboxButton)
Vue.use(CheckboxGroup)
Vue.use(Switch)
Vue.use(Select)
Vue.use(Option)
Vue.use(OptionGroup)
Vue.use(Button)
Vue.use(ButtonGroup)
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(DatePicker)
Vue.use(TimeSelect)
Vue.use(Popover)
Vue.use(Tooltip)
Vue.use(Form)
Vue.use(FormItem)
Vue.use(Tabs)
Vue.use(TabPane)
Vue.use(Tag)
Vue.use(Tree)
Vue.use(Alert)
Vue.use(Icon)
Vue.use(Row)
Vue.use(Col)
Vue.use(Upload)
Vue.use(Progress)
Vue.use(Badge)
Vue.use(Card)
Vue.use(Steps)
Vue.use(Step)
Vue.use(Carousel)
Vue.use(CarouselItem)
Vue.use(Collapse)
Vue.use(CollapseItem)
Vue.use(Cascader)
Vue.use(Container)
Vue.use(Header)
Vue.use(Aside)
Vue.use(Main)
Vue.use(Footer)

Vue.use(Loading.directive)

Vue.prototype.$loading = Loading.service
Vue.prototype.$msgbox = MessageBox
Vue.prototype.$alert = MessageBox.alert
Vue.prototype.$confirm = MessageBox.confirm
Vue.prototype.$prompt = MessageBox.prompt
Vue.prototype.$notify = Notification
Vue.prototype.$message = Message


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
Vue.component('admin-message-list', require('./components/admin/messages/list.vue'));
Vue.component('admin-message-category', require('./components/admin/messages/category.vue'));




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
