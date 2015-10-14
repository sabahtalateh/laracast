new Vue({
    el: '#demo',

    data: {
        gender: 'all',

        people: [
            {name: 'Alez', gender: 'male'},
            {name: 'Mike', gender: 'male'},
            {name: 'Susan', gender: 'female'},
            {name: 'Vin', gender: 'male'},
            {name: 'Liza', gender: 'female'},
            {name: 'Marta', gender: 'female'},
            {name: 'Adui', gender: 'male'},
        ]
    },

    filters: {
        gender: function (people) {
            if (this.gender == 'all') {
                return people;
            }

            return people.filter(function (person) {
                return person.gender == this.gender;
            }.bind(this));
        }
    }
});