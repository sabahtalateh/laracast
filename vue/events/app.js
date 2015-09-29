new Vue({
    el: '#demo',

    methods: {
        onKeyUp: function () {
            console.log('Key Up');
        },
        onBlur: function () {
            console.log('Blur');
        }
    }
});