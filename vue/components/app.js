Vue.component('coupon', {
    template: '#coupon-template',

    props: ['when-applied'],

    data: function () {
        return {
            coupon: '',
            message: ''
        }
    },

    methods: {
        couponHasBeenEntered: function () {
            this.validate();
        },

        validate: function () {
            if (this.coupon == 'FOOBAR') {
                this.whenApplied(this.coupon);
                return this.message = '20% Off!';
            }

            this.message = 'Thar coupon does not exist';
        }
    }
});

new Vue({
    el: '#demo',

    methods: {
        setCoupon: function (coupon) {
            this.$set('coupon', coupon);
        }
    }
});
