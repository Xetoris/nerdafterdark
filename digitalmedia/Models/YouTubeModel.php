<?php namespace DigitalMedia\Models;

/**
* Represents a YouTube video.
*
* @author Chris Mccord
*/
class YouTubeModel extends BaseContentModel {
  const TYPE_NAME = "youtube";

  //thumbnail
  public $thumbnail = null;

  public function __construct($provider) {
    parent::__construct(self::TYPE_NAME, $provider);
  }

}
