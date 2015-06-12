<?php namespace DigitalMedia\Providers;

use DigitalMedia\Interfaces\DigitalMediaProvider;
use DigitalMedia\Models\PodcastModel;
use GuzzleHttp\Client;
use Carbon\Carbon;

class LibsynProvider implements DigitalMediaProvider {

  const PUBLISHER_KEY = "libsyn";
  protected $http_client;

  public function __construct($base_address)
  {
      $this->http_client = new Client(['base_url' => $base_address]);
  }

  public function getPublishedContent($count=null) {
     $response = $this->http_client->get('rss');

     $track_list = array();

     foreach(simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA)->channel->item as $value)
     {
       if(!is_null($count) && count($track_list) >= $count)
       {
         break;
       }

       $itunes_specific_nodes = $value->children("itunes", true);
       $title_parts = explode(" ", $value->title);
       $number_raw = array_pop($title_parts);
       $title = implode(" ", $title_parts);
       $number_parts = explode("#", $number_raw);
       $podcast = new PodcastModel(self::PUBLISHER_KEY);
       $podcast->id = (string)$value->guid;
       $podcast->date_created = new Carbon((string)$value->pubDate);
       $podcast->duration = (string)$itunes_specific_nodes->duration;

       if(!is_null($value->description) && strlen((string)$value->description) > 0)
       {
         $podcast->description = trim(str_replace("</p>", "", explode('<p>',$value->description)[1]));
       }

       $podcast->title = $title;
       $podcast->number = array_pop($number_parts);
       $podcast->url = (string)$value->enclosure["url"];
       $podcast->tags = explode(",", (string)$itunes_specific_nodes->keywords);

       array_push($track_list, $podcast);
     }

     return $track_list;
  }

  public function getPublisherKey(){
    return self::PUBLISHER_KEY;
  }

  public function getPublicationType() {
    return PodcastModel::TYPE_NAME;
  }
}
