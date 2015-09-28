var TaskList = React.createClass({

    render: function() {

        //console.log(this.props);

        var displayTask = (task, event) => <li onClick={this.props.removeTask.bind(this, event)}>{task}</li>;

        return (
            <ul>
                { this.props.items.map(displayTask) }
            </ul>
        );
    }

});