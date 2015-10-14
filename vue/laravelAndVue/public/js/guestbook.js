Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
    el: '#guestbook',

    data: {
        newMessage: {
            name: '',
            body: ''
        },
        messages: [],
        submitted: false
    },

    computed: {
        errors: function () {
            for (var key in this.newMessage) {
                if (!this.newMessage[key]) return true;
            }

            return false;
        }
    },

    methods: {
        fetchMessages: function () {
            this.$http.get('api/messages', function (messages) {
                this.$set('messages', messages);
            })
        },

        onSubmitForm: function (e) {
            e.preventDefault();

            var message = this.newMessage;

            this.newMessage = {name: '', body: ''};
            this.messages.push(message);
            this.submitted = true;

            console.log(message.body);

            this.$http.post('api/messages', message);
        }
    },

    ready: function () {
        this.fetchMessages();
    }
});