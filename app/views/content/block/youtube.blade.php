<div class="row youtube content-block">
  <div class="youtube-icon-wrapper col-sm-1 visible-lg">
    <a class="youtube-icon-link" href="https://www.youtube.com/channel/{{$channelid}}" target="_blank">
      <img class="youtube-icon" src="{{URL::asset('/resources/YouTube-icon-full_color.png')}}" alt="YouTube"></img>
    </a>
  </div>
  <div class="col-sm-11">
    <div class="youtube-label hidden-lg"><a href="https://www.youtube.com/channel/{{$channelid}}" target="_blank">YouTube Channel</a></div>
    <div class="youtube-title hidden-lg"><h4><a href="{{$youtube->url}}" target="_blank">{{$youtube->title}}</a></div>
    <a class="visible-lg youtube-thumbnail-link" href="{{$youtube->url}}" target="_blank">
      <img class="youtube-thumbnail" src="{{$youtube->thumbnail}}" alt="{{$youtube->title}}"></img>
    </a>
    <div class="youtube-description">{{$youtube->description}}</div>
  </div>
</div>
