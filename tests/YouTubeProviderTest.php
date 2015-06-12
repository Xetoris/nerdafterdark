<?php

use DigitalMedia\Providers\YouTubeProvider;

class YouTubeProviderTest extends TestCase {

  protected $provider;

  public function setUp() {
    parent::setUp();
    $this->provider = new YouTubeProvider(env('YT_PUB_KEY'),env('YT_API_KEY'));
  }

  public function testYouTubeFetch() {
    $results = $this->provider->getPublishedContent(10);

    dd($results);

    $this->assertNotEmpty($result);
  }
}
