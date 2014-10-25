<?php

class YouTubeController extends BaseContentController {
  public function Latest() {
    return View::make('liveaction/liveaction', array('content_feed' => $this->source->GetLatestContentFromFeed(array(YouTubeModel::TYPE_NAME))));
  }

  public function Archived(){
    return View::make('liveaction/liveaction', array('content_feed' => $this->source->GetAllContentFromFeed(array(YouTubeModel::TYPE_NAME))));
  }
}
