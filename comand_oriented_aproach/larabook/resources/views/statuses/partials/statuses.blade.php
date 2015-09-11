@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>No statuses</p>
@endforelse

{{--@if ($statuses->count())--}}
    {{--@foreach($statuses as $status)--}}
        {{--@include('statuses.partials.status')--}}
    {{--@endforeach--}}
{{--@else--}}
    {{--<p>No statuses</p>--}}
{{--@endif--}}