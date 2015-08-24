<article>
    <h2>{{ $lesson->getTitle() }}</h2>
    {{ $lesson->getPublishedDate() }}
    <div class="body">
        {{ $lesson->getBody() }}
    </div>
</article>