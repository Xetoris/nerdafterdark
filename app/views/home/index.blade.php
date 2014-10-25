@extends ('layouts/default')

@section('content')

@foreach($content_feed as $content)
    @if($content->GetContentType() == PodcastModel::TYPE_NAME)
        @include('content/block/podcast', array('podcast'=>$content))
    @endif
    @if($content->GetContentType() == YouTubeModel::TYPE_NAME)
      @include('content/block/youtube', array('youtube'=>$content, 'channelid'=>Config::get('app.youtubechannelid')))
    @endif
@endforeach

@stop
