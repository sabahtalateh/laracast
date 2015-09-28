new Vue({
    el: '#task',

    data: {
        tasks: [
            {body: 'Go to store', completed: false}
        ],
        newTask: ''
    },

    computed: {
        completions: function () {
            return this.tasks.filter(function (task) {
                return task.completed;
            })
        },

        remaining: function () {
            return this.tasks.filter(function (task) {
                return !task.completed;
            })
        }
    },

    filters: {
        inProcess: function (tasks) {
            return tasks.filter(function (task) {
                return !task.completed;
            });
        },
        completeTasks: function (tasks) {
            return tasks.filter(function (task) {
                return task.completed;
            })
        }
    },

    methods: {
        addTask: function (e) {
            e.preventDefault();

            if (!this.newTask) return;

            this.tasks.push({
                body: this.newTask,
                completed: false
            });

            this.newTask = '';
        },

        editTask: function (task) {
            this.removeTask(task);
            this.newTask = task.body;
            this.$$.newTask.focus();
        },

        toggleTask: function (task) {
            task.completed = !task.completed;
        },

        completeAll: function () {
            this.tasks.forEach(function (task) {
                task.completed = true;
            });
        },

        removeTask: function (task) {
            console.log(task);
            this.tasks.$remove(task);
        },

        clearCompleted: function (task) {
            this.tasks = this.tasks.filter(function (task) {
                return ! task.completed;
            });
        }
    }
});

