import Vue from 'vue';
import App from './App.vue';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';

require('dotenv').config();
const moment = require('moment');
require('moment/locale/es');

Vue.config.productionTip = false;
// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
// Add Vue-Moment
Vue.use(require('vue-moment'), {
  moment,
});
new Vue({
  render: h => h(App),
}).$mount('#app');