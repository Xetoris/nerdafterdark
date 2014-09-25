<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SoundCloudPublisher
 *
 * @author Chris Mccord
 */


class SoundCloudPublisher extends BaseContentPublisher {
    
    protected $client = null;
    protected $apiId = null;
    private $publisherkey = "soundcloud";
    
    function __construct($endpoint)
    {
        $this->client = new JsonCurlUtility($endpoint);
        $this->apiId = Config::get('app.soundcloudapikey');
    }
    
    public function GetPublishedContent($count) {
        $id = $this->SoundCloudResolveId();

        $collection = $this->SoundCloudGetTracks($id, $count);

        return $collection;        
    }
    
    private function SoundCloudResolveId() {        
        $params = $this->client->GetToResource("resolve.json?url=http://soundcloud.com/nerdafterdark&client_id={$this->apiId}");
        
        $location = $params->{'location'};

        $id = explode('users/', explode('.json', $location)[0])[1];

        return $id;
    }

    private function SoundCloudGetTracks($id, $count) {
        $params = $this->client->GetToResource("users/{$id}/tracks.json?client_id={$this->apiId}");

        $trackList = array();
        
        foreach ($params as $track) {
            $track_listing = new PodcastModel($this->publisherkey);

            $track_listing->id = $track->{'id'};
            $track_listing->date_created = new DateTime($track->{'created_at'});
            $track_listing->duration = $track->{'duration'};
            $track_listing->description = $track->{'description'};
            $track_listing->title = $track->{'title'};
            $track_listing->url = $track->{'permalink_url'};
            $track_listing->tags = explode(" ", $track->{'tag_list'});
            
            array_push($trackList, $track_listing);
        }
        
        return array_slice($trackList,0,$count);
    }

    public function GetPublisherKey() {
        return $this->publisherkey;
    }

    public function GetPublicationType() {
        return PodcastModel::TYPE_NAME;
    }
}
