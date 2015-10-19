var Vue = require('vue');
var Resource = require('vue-resource');

Vue.use(Resource);

new Vue({
    el: '#app',

    data: {
        currentView: 'checkout-view'
    },

    components: {
        'checkout-view': require('./views/checkout'),
    }
});
