@extends ('layouts/default')

@section('content')

@foreach($content_feed as $content)
    @if($content->GetContentType() == PodcastModel::TYPE_NAME)
        @include('content/block/podcast', array('podcast'=>$content))
    @endif
@endforeach

@stop