<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LibsynPublisher
 *
 * @author Chris Mccord
 */
class LibsynPublisher extends BaseContentPublisher {
    protected $client = null;
    private $publisherkey = "libsyn";

    function __construct($endpoint)
    {
        $this->client = new XmlCurlUtility($endpoint);
    }

    public function GetPublishedContent($count)
    {
        $feed = $this->client->GetToResource("rss");

        $trackList = array();

        foreach($feed->channel->item as $value)
        {
            if(!is_null($count) && count($trackList) >= $count)
            {
                break;
            }

            $itunes_specific_nodes = $value->children("itunes", true);

            $podcast = new PodcastModel($this->publisherkey);
            $podcast->id = (string)$value->guid;
            $podcast->date_created = new DateTime((string)$value->pubDate);
            $podcast->duration = (string)$itunes_specific_nodes->duration;
            $podcast->description = trim(explode("<p>&nbsp;</p>",$value->description)[0]);
            $podcast->title = (string) $value->title;
            $podcast->url = (string)$value->enclosure["url"];
            $podcast->tags = explode(",", (string)$itunes_specific_nodes->keywords);

            array_push($trackList, $podcast);
        }

        return $trackList;
    }

    public function GetPublisherKey() {
        return $this->publisherkey;
    }

    public function GetPublicationType() {
        return PodcastModel::TYPE_NAME;
    }

}
