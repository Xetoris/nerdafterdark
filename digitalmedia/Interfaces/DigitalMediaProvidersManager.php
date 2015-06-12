<?php namespace DigitalMedia\Interfaces;

interface DigitalMediaProvidersManager {
  public function addProvider(DigitalMediaProvider $provider);
  public function getPublishedContent($count);
  public function getProviderByKey($provider_key);
}
