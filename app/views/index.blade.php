@extends ('layouts/default')

@section('content')

@foreach($podcasts as $podcast)
@include('podcasts\soundcloud', array('podcast'=>$podcast))
@endforeach

@stop
