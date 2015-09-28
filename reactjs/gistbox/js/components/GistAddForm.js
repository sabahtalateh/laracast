var GistAddForm = React.createClass({

    getInitialState: function () {
        return {
            username: ''
        }
    },

    onChange: function (event) {
        this.setState({
            username: event.target.value
        });
    },

    addGist: function (event) {
        event.preventDefault();

        this.props.onAdd(this.state.username);
        this.setState({username: ''});
    },

    render: function () {
        return (
            <div>
                <form className="form" onSubmit={this.addGist}>
                    <input value={this.state.username} onChange={this.onChange} placeholder="type a username"/>
                    <button>Fetch latest Gist</button>
                </form>
            </div>
        );
    }
});

export default GistAddForm;