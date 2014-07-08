<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends BaseController {
   public function Index(){
       
       $podcasts = $this->GetRecentSoundCloudInstances();
       
       return View::make('index', array('podcasts'=>$podcasts));
   }
   
   
   private function GetRecentSoundCloudInstances() {

        $id = $this->SoundCloudResolveId();

        $collection = $this->SoundCloudGetTracks($id);

        return $collection;
    }

    private function SoundCloudResolveId() {
        $key = $this->GetSoundCloudClientId();

        $url = "http://api.soundcloud.com/resolve.json?url=http://soundcloud.com/nerdafterdark&client_id=$key";

        $params = $this->ExecuteCurlForJson($url);

        $location = $params->{'location'};

        $id = explode('users/', explode('.json', $location)[0])[1];

        return $id;
    }

    private function SoundCloudGetTracks($id, $count=3) {
        $key = $this->GetSoundCloudClientId();

        $url = "http://api.soundcloud.com/users/$id/tracks.json?client_id=$key";

        $params = $this->ExecuteCurlForJson($url);

        $trackList = array();
        
        foreach ($params as $track) {
            $track_listing = new SoundCloudTrackListing();

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

    private function GetSoundCloudClientId() {
        return Config::get('app.soundcloudapikey');
    }

    private function ExecuteCurlForJson($url) {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        $json_object = json_decode($result);

        return $json_object;
    }

}
