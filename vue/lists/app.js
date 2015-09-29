new Vue({
    el: '#demo',

    data: {
        names: ['Mike', 'Jane', 'Liza', 'Fred', 'John'],
        newName: ''
    },

    methods: {
        addName: function (e) {
            this.names.push(this.newName);

            this.newName = '';
        }
    }
});