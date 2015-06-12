<?php namespace DigitalMedia\Interfaces;

interface DigitalMediaProvider {
  public function getPublishedContent($count);
  public function getPublisherKey();
  public function getPublicationType();
}
