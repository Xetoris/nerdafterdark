@extends('frame')

@section('includes')
 <link rel="import" href="<% asset('bower/paper-shadow/paper-shadow.html') %>" />
 <link rel="import" href="<% asset('bower/paper-icon-button/paper-icon-button.html') %>" />
 <link rel="stylesheet" type="text/css" href="<% asset('css/content.css') %>" />
@stop

@section('script')
<script type="text/javascript">
  $(function(){
    $('.content-panel').hover(function(){
      this.setZ(3);
    },function(){
      this.setZ(1);
    });
  });
</script>
@stop

@section('content')
<div class="media-content" flex layout horizontal wrap>
  @foreach($feed as $content)
  <paper-shadow z='1' class="content-panel" animated>
    <div class="content-block" layout vertical>
      @if($content->getContentType() == DigitalMedia\Models\PodcastModel::TYPE_NAME)
        @include('media\podcast', array('podcast'=>$content))
      @elseif($content->getContentType() == DigitalMedia\Models\YouTubeModel::TYPE_NAME)
        @include('media\youtube', array('youtube'=>$content, 'channelid'=>$channelid))
      @endif
     </div>
  </paper-shadow>
  @endforeach
</div>
@stop
