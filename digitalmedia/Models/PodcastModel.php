<?php namespace DigitalMedia\Models;

/**
* Represents a Podcast.
*
* @author Chris Mccord
*/
class PodcastModel extends BaseContentModel {

  const TYPE_NAME = "podcast";

  public function __construct($provider) {
    parent::__construct(self::TYPE_NAME, $provider);
  }

  /**
  * The duration of the podcast.
  * @var
  */
  public $duration = -1;

  /**
  * The list of tags associated with podcast.
  * @var
  */
  public $tags = array();

  /**
  * The number of the podcast.
  * @var
  */
  public $number = -1;
}
