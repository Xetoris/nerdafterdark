@extends ('layouts/default')

@section('content')

@foreach($content_feed as $content)
    @if($content->GetContentType() == YouTubeModel::TYPE_NAME)
        @include('content/block/youtube', array('youtube'=>$content, 'channelid'=>Config::get('api.youtubechannelid')))
    @endif
@endforeach

@stop
