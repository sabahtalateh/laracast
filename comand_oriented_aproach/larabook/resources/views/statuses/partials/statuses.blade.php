@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>No statuses</p>
@endforelse
