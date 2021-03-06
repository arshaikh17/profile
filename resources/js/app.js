
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue								 =	require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Tracker Components
 */
const tracker							 =	"";
//console.log(require("./../views/tracker/modules/components/IndexComponent.vue"));
Vue.component("issue-index", require("./../views/tracker/modules/issues/_components/IndexComponent.vue").default);
Vue.component("issue-show", require("./../views/tracker/modules/issues/_components/ShowComponent.vue").default);
Vue.component("issue-form", require("./../views/tracker/modules/issues/_components/FormComponent.vue").default);
Vue.component("module-index", require("./../views/tracker/modules/_components/IndexComponent.vue").default);

/**
 * Investments Components
 */
Vue.component("investments-index", require("./../views/investments/_components/IndexComponent.vue").default);
Vue.component("investments-organisations-show", require("./../views/investments/organisations/_components/ShowComponent.vue").default);

/**
 * Comcis Components
 */
Vue.component("comics-collectibles-index", require("./../views/comics/collectibles/_components/IndexComponent.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app								 =	new Vue({
	el									 :	"#app"
});
