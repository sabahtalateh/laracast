<article class="comments__comment media status-media">
    <div class="pull-left">
        @include('users.partials.avatar', ['user' => $comment->user, 'class' => 'status-media-object'])
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ $comment->user->username }}</h4>

        {{ $comment->body }}
    </div>
</article>