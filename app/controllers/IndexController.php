<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends BaseContentController {

    public function Index() {       
        return View::make('home/index', array('content_feed' => $this->source->GetLatestContentFromFeed()));
    }

    public function FancyIndex() {
        return View::make('home/fancy', array('content_feed' => $this->source->GetLatestContentFromFeed()));
    }
}
