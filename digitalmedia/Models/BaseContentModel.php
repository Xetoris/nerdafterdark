<?php namespace DigitalMedia\Models;

/**
* Represents the base kind of Content Model.
*
* @author Chris Mccord
*/
class BaseContentModel {
  protected $type = null;
  public $provider = null;
  public $id = null;
  public $date_created = null;
  public $title = null;
  public $description = null;
  public $url = null;

  protected function __construct($type, $provider) {
    $this->type = $type;
    $this->provider = $provider;
  }

  public function getContentType()
  {
    return $this->type;
  }

  public static function sortDescendingByDate($instance1, $instance2)
  {
    if($instance1->date_created->eq($instance2 ->date_created))
    {
      return 0;
    }

    return ($instance2->date_created->gt($instance1->date_created)) ? 1 : -1;
  }
}
