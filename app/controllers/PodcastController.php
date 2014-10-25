<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PodcastController extends BaseContentController {

    public function Latest() {
        return View::make('podcasts/podcasts', array('content_feed' => $this->source->GetLatestContentFromFeed(array(PodcastModel::TYPE_NAME))));
    }

    public function Archived() {
        return View::make('podcasts/podcasts', array('content_feed' => $this->source->GetAllContentFromFeed(array(PodcastModel::TYPE_NAME))));
    }
}
