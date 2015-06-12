<?php

use DigitalMedia\Providers\YouTubeProvider;

class LibsynProviderTest extends TestCase {

  protected $provider;

  public function setUp() {
    parent::setUp();
    $this->provider = new LibsynProvider(getenv('LIBSYN_BASE_URL'));
  }

  public function testYouTubeFetch() {
    $results = $this->provider->getPublishedContent(10);

    dd($results);

    $this->assertNotEmpty($result);
  }
}
