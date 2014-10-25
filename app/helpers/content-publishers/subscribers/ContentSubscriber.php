<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContentSubscriber
 *
 * @author Chris Mccord
 */

class ContentSubscriber {
    private $feeds = null;
    private $defaultContentCount = null;

    function __construct()
    {
        $this->feeds = array (
          new LibsynPublisher("http://nerdafterdark.libsyn.com"),
          new YouTubePublisher()
        );

        $this->defaultContentCount = intval(Config::get('app.defaultcontentcount'));
    }

    public function GetLatestContentFromFeed($sourceTypes=array()){
        return $this->GetContent($this->defaultContentCount, $sourceTypes);
    }

    public function GetAllContentFromFeed($sourceTypes){
        return $this->GetContent(null, $sourceTypes);
    }

    private function GetContent($limit, $sourceTypes)
    {
        $collection = array();

        foreach($this->feeds as $feed)
        {
            if(empty($sourceTypes) || in_array($feed->GetPublicationType(), $sourceTypes))
            {
                $collection = array_merge($collection, $feed->GetPublishedContent($limit));
            }
        }

        usort($collection, array("BaseContentModel","SortDescendingByDate"));

        return $collection;
    }
}
