<?php

class YouTubePublisher extends BaseContentPublisher
{
  protected $client = null;
  private $publisherKey = "youtube";

  function __construct()
  {
      $this->client = new Google_Client();
      $this->client->setApplicationName("nerdafterdark");
      $this->client->setDeveloperKey(Config::get('app.googleapikey'));
  }

  public function GetPublishedContent($count)
  {
      $service = new Google_Service_YouTube($this->client);

      $search_array = array(
        'channelId' => Config::get('app.youtubechannelid'),
        'type' => 'video'
      );

      if(!is_null($count))
      {
        $search_array['maxResults'] = $count;
      }

      $response = $service->search->listSearch('id,snippet', $search_array);

      $videoList = array();
      $youtubevideoformat = 'https://www.youtube.com/watch?v=%s';

      foreach($response['items'] as $item)
      {
        $model = new YouTubeModel($this->publisherKey);
        $model->id = $item['id']['videoId'];
        $model->date_created = new DateTime($item['snippet']['publishedAt']);
        $model->title = $item['snippet']['title'];
        $model->description = $item['snippet']['description'];
        $model->url = sprintf($youtubevideoformat, $model->id);
        $model->thumbnail = $item['snippet']['thumbnails']['default']['url'];

        array_push($videoList, $model);
      }

      return $videoList;
  }

  public function GetPublisherKey()
  {
    return $publisherKey;
  }

  public function GetPublicationType()
  {
    return YouTubeModel::TYPE_NAME;
  }
}
