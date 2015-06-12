<?php namespace DigitalMedia\Providers;

use DigitalMedia\Interfaces\DigitalMediaProvider;
use DigitalMedia\Models\YouTubeModel;
use DigitalMedia\Utility\GoogleClient;
use GuzzleHttp\Client;
use Carbon\Carbon;

class YouTubeProvider implements DigitalMediaProvider
{
  const PUBLISHER_KEY = "youtube";

  protected $client = null;
  private $channel_id;

  function __construct($channel_id, $api_key)
  {
    $this->client = new GoogleClient($api_key);
    $this->channel_id = $channel_id;
  }

  public function getPublishedContent($count)
  {
    $service = new \Google_Service_YouTube($this->client->gclient);

    $search_array = array(
      'channelId' => $this->channel_id,
      'type' => 'video'
    );

    if(!is_null($count))
    {
      $search_array['maxResults'] = $count;
    }

    $response = $service->search->listSearch('id,snippet', $search_array);

    $video_list = array();
    $youtube_video_format = 'https://www.youtube.com/watch?v=%s';

    foreach($response['items'] as $item)
    {
      $model = new YouTubeModel(self::PUBLISHER_KEY);
      $model->id = $item['id']['videoId'];
      $model->date_created = new Carbon($item['snippet']['publishedAt']);
      $model->title = $item['snippet']['title'];
      $model->description = $item['snippet']['description'];
      $model->url = sprintf($youtube_video_format, $model->id);
      $model->thumbnail = $item['snippet']['thumbnails']['high']['url'];

      array_push($video_list, $model);
    }

    return $video_list;
  }

  public function getPublisherKey(){
    return self::PUBLISHER_KEY;
  }

  public function getPublicationType()
  {
    return YouTubeModel::TYPE_NAME;
  }
}
