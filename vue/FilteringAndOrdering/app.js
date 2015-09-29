new Vue({
    el: '#demo',

    data: {
        sortKey: '',
        reverse: false,
        search: '',
        columns: [
            'name',
            'age'
        ],
        people: [
            {name: "John", age: 50},
            {name: "Mike", age: 5},
            {name: "Alison", age: 25},
            {name: "Jeff", age: 30},
            {name: "Taylor", age: 35},
            {name: "Yomata", age: 185},
            {name: "Ivan", age: 47},
            {name: "Lynda", age: 32},
        ]
    },

    methods: {
        sortBy: function (sortKey) {
            this.reverse = (this.sortKey == sortKey) ? ! this.reverse : false;

            this.sortKey = sortKey;
        }
    }
});