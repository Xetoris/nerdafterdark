<?php namespace DigitalMedia\Utility;

use DigitalMedia\Interfaces\DigitalMediaProvidersManager;
use DigitalMedia\Interfaces\DigitalMediaProvider;
use DigitalMedia\Providers\LibsynProvider;
use DigitalMedia\Providers\YouTubeProvider;

class ProvidersManager implements DigitalMediaProvidersManager
{
  /**
   *  List of providers we are managing.
   *
   * @var array
   */
  protected $providers;

  public function __construct($providers = null){
    if(is_null($providers))
    {
      $this->providers = array(new LibsynProvider(getenv('LIBSYN_BASE_URL')),new YouTubeProvider(getenv('YT_PUB_KEY'),getenv('YT_API_KEY')));
    }else{
      $this->providers = $providers;
    }
  }

  /**
   * Adds an instance of DigitalMediaProvider to the list.
   * @return null
   */
  public function addProvider(DigitalMediaProvider $provider) {
    array_push($this->providers, $provider);
  }

  /**
   * Returns a populated array of all content publishers, based on count requested.
   * @return array
   */
  public function getPublishedContent($count=null) {
    $content = array();

    foreach($this->providers as $provider) {
      $content = array_merge($content, $provider->getPublishedContent($count));
    };

    $this->sortResultsByDate($content);

    return array_slice($content, 0, $count);
  }

  /**
   * Returns a populated array of all content publishers, based on count requested.
   * @return array
   */
  public function getPublishedContentFromProvider($key, $count=null) {
    if(is_null($key) || strlen($key) < 1)
    {
      throw('Provider key is required!');
    }

    $provider = $this->getProviderByKey($key);

    if(is_null($provider))
    {
      throw('No matching provider found!');
    }

    $content = $provider->getPublishedContent($count);

    $this->sortResultsByDate($content);

    return $content;
  }

  /**
   * Returns a provider whose publisher key matches the one requested.
   *
   * @return DigitalMediaProvider
   */
  public function getProviderByKey($provider_key) {
    $target = null;

    foreach($this->providers as $provider) {
      if($provider->getPublisherKey() == $provider_key){
        $target = $provider;
        break;
      }
    }

    return $target;
  }

  /**
  * Sorts an array of BaseContentModel by the published date.
  */
  private static function sortResultsByDate(&$to_sort) {
    return usort($to_sort, array('DigitalMedia\Models\BaseContentModel', 'sortDescendingByDate'));
  }
}
