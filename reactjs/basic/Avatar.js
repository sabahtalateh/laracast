var Avatar = React.createClass({
    getDefaultProps: function () {
        return {
            path: 'https://pbs.twimg.com/profile_images/1782396641/Avatar-Grey-j.jpg'
        };
    },

    render: function () {
        return <div>
            <a href={this.props.path}>
                <img src={this.props.path} />
            </a>
        </div>;
    }
});

React.render(<Avatar path="http://vkurske.com/website/var/tmp/thumb_556__avatarProfile.png" />, document.body);
