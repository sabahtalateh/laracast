//Vue.directive('confirm', function (message) {
//    this.el.addEventListener('click', function (e) {
//        if (!confirm(message)) {
//            e.preventDefault();
//
//            return;
//        }
//    });
//});

//Vue.directive('confirm', {
//    isLiteral: true,
//
//    bind: function () {
//        this.el.addEventListener('click', function (e) {
//            if (!confirm(this.expression)) {
//                e.preventDefault();
//
//                return;
//            }
//        }.bind(this));
//    }
//
//});

Vue.directive('example', {
    acceptStatement: true,

    update: function (expr) {
        expr();
    }
});

new Vue({
    el: '#demo',

    data: {
        age: 1
    },

    methods: {
        check: function () {
            alert('Form was submitted');
        }

    }
});
