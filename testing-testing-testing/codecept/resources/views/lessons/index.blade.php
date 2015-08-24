@foreach ($lessons as $lesson)
    <article>
        <h3>{{ $lesson->name }}</h3>
        <a href="{{url('/lessons/addToWatchLater/' . $lesson->id)}}" class="watch-later">watch later</a>
        <hr/>
    </article>
@endforeach