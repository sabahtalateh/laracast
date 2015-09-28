var TaskApp = React.createClass({
    getInitialState: function() {
        return {
            items: [1,2,3,4,5],
            task: ''
        };
    },

    onChange: function(e) {
        var task = e.target.value;

        this.setState({ task });
    },

    addTask: function(e) {
        this.setState({
            items: this.state.items.concat([this.state.task]),
            task: ''
        });

        e.preventDefault();
    },

    removeTask: function(item, e) {
        var items = this.state.items;
        delete items[item];

        this.setState({ items });
    },

    render: function() {
        return (
            <div>
                <h1>My Tasks</h1>

                <TaskList items={this.state.items} removeTask={this.removeTask} />

                <form onSubmit={this.addTask}>
                    <input onChange={this.onChange} value={this.state.task} />
                    <button>Add Task</button>
                </form>
            </div>
        );
    }

});

React.render(<TaskApp />, document.body);