@if ($signedIn)
    @if ($user->isFallowedBy($currentUser))
        {!! Form::open(['method' => 'delete', 'route' => ['fallow_path', $user->id]]) !!}
            {!! Form::hidden('userIdToUnfallow', $user->id) !!}
            <button type="submit" class="btn btn-danger">Unfallow {{ $user->username }}</button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => 'fallows_path']) !!}
            {!! Form::hidden('userIdToFallow', $user->id) !!}
            <button type="submit" class="btn btn-primary">Fallow {{ $user->username }}</button>
        {!! Form::close() !!}
    @endif
@endif