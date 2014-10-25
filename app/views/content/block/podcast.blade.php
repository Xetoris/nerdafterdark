<div class="row podcast content-block">
    <div class="podcast-image-tag col-sm-1 visible-lg rotated-twohundredseventy"></div>
    <div class="col-sm-11">
        <div class="podcast-label hidden-lg">Podcast</div>
        <div class="podcast-title"><h4><a href="{{$podcast->url}}" target="_blank">{{$podcast->title}}</a></h4></div>
        <div class="podcast-description">{{$podcast->description}}</div>
        <div class="podcast-duration">Run Time: {{is_numeric($podcast->duration)? gmdate("H:i:s",($podcast->duration)/1000) : $podcast->duration }}</div>
    </div>
</div>
