<h1>{{ $lesson->title }}</h1>

@if (!\Illuminate\Support\Facades\Auth::guest())
    <h1>You can download the video</h1>
@else
    <h1>Please authorize to watch this video</h1>
@endif

<a href="
    @if (Auth::guest())
        /auth/register
    @else
        ''
    @endif
">Buy this video</a>