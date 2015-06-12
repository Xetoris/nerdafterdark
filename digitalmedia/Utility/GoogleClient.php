<?php namespace DigitalMedia\Utility;

class GoogleClient {
  public $gclient;

  function __construct($api_key){
    $this->gclient = new \Google_Client();
    $this->gclient->setApplicationName("nerdafterdark");
    $this->gclient->setDeveloperKey($api_key);
  }
}
