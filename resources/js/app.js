/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import 'element-ui/lib/theme-chalk/index.css';


window.axios = require('axios');

window.Vue = require('vue');
window.Event = new Vue();

Vue.component("v-select", vSelect);

Vue.use(ElementUI, { locale })
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);




/******************************************** Personnel *********************************************************/

/********************************************* List ***********************************************************/

Vue.component('list-company', require('./components/Personnel/Company/List/ListCompany.vue').default);
Vue.component('list-user', require('./components/Personnel/User/List/ListUser.vue').default);

/******************************************** Element *********************************************************/
Vue.component('element-company', require('./components/Personnel/Company/Element/ElementCompany.vue').default);
Vue.component('element-user', require('./components/Personnel/User/Element/ElementUser.vue').default);

/********************************************* Form ***********************************************************/
Vue.component('edit-company', require('./components/Personnel/Company/Form/EditCompany.vue').default);
Vue.component('delete-company', require('./components/Personnel/Company/Form/DeleteCompany.vue').default);
Vue.component('create-company', require('./components/Personnel/Company/Form/CreateCompany.vue').default);
Vue.component('edit-user', require('./components/Personnel/User/Form/EditUser.vue').default);
Vue.component('delete-user', require('./components/Personnel/User/Form/DeleteUser.vue').default);
Vue.component('create-user', require('./components/Personnel/User/Form/CreateUser.vue').default);







/******************************************** Shipment ********************************************************/

/********************************************* OUT ***********************************************************/

/********************************************* List ***********************************************************/
Vue.component('list-shipment-out', require('./components/Shipment/Out/List/ListShipment.vue').default);
Vue.component('list-shipment-out-details', require('./components/Shipment/Out/List/ListShipmentDetails.vue').default);

/******************************************** Element *********************************************************/
Vue.component('element-shipment-out', require('./components/Shipment/Out/Element/ElementShipment.vue').default);
Vue.component('element-scanner-out', require('./components/Shipment/Out/Element/ElementScanner.vue').default);

/********************************************* Form ***********************************************************/
Vue.component('edit-shipment-out', require('./components/Shipment/Out/Form/EditShipment.vue').default);
Vue.component('create-shipment-out', require('./components/Shipment/Out/Form/CreateShipment.vue').default);


/********************************************* IN ***********************************************************/

/********************************************* List ***********************************************************/
Vue.component('list-shipment-in', require('./components/Shipment/In/List/ListShipment.vue').default);

/******************************************** Element *********************************************************/
Vue.component('element-clean-shipment-in', require('./components/Shipment/In/Element/ElementCleanShipment.vue').default);
Vue.component('element-damage-shipment-in', require('./components/Shipment/In/Element/ElementDamageShipment.vue').default);

/********************************************* Form ***********************************************************/

Vue.component('remove-movement', require('./components/Shipment/In/Form/RemoveMovement.vue').default);
Vue.component('update-movement', require('./components/Shipment/In/Form/UpdateMovement.vue').default);



/******************************************** Movement ********************************************************/

/********************************************* List ***********************************************************/
Vue.component('list-movement', require('./components/Movement/List/ListMovement.vue').default);

/******************************************** Element *********************************************************/
Vue.component('element-movement', require('./components/Movement/Element/ElementMovement.vue').default);

/********************************************* Form ***********************************************************/
Vue.component('delete-movement', require('./components/Movement/Form/DeleteMovement.vue').default);
Vue.component('create-movement', require('./components/Movement/Form/CreateMovement.vue').default);





/******************************************** Packagings *******************************************************/

/********************************************* List ***********************************************************/
Vue.component('list-packaging', require('./components/Packaging/Packaging/List/ListPackaging.vue').default);
Vue.component('list-category', require('./components/Packaging/Category/List/ListCategory.vue').default);
Vue.component('list-type', require('./components/Packaging/Type/List/ListType.vue').default);

/******************************************** Element *********************************************************/
Vue.component('element-packaging', require('./components/Packaging/Packaging/Element/ElementPackaging.vue').default);
Vue.component('element-category', require('./components/Packaging/Category/Element/ElementCategory.vue').default);
Vue.component('element-type', require('./components/Packaging/Type/Element/ElementType.vue').default);

/********************************************* Form ***********************************************************/
Vue.component('edit-packaging', require('./components/Packaging/Packaging/Form/EditPackaging.vue').default);
Vue.component('delete-packaging', require('./components/Packaging/Packaging/Form/DeletePackaging.vue').default);
Vue.component('create-packaging', require('./components/Packaging/Packaging/Form/CreatePackaging.vue').default);

Vue.component('edit-category', require('./components/Packaging/Category/Form/EditCategory.vue').default);
Vue.component('delete-category', require('./components/Packaging/Category/Form/DeleteCategory.vue').default);
Vue.component('create-category', require('./components/Packaging/Category/Form/CreateCategory.vue').default);

Vue.component('edit-type', require('./components/Packaging/Type/Form/EditType.vue').default);
Vue.component('delete-type', require('./components/Packaging/Type/Form/DeleteType.vue').default);
Vue.component('create-type', require('./components/Packaging/Type/Form/CreateType.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
