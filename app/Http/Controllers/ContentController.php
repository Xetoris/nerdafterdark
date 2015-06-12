<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DigitalMedia\Interfaces\DigitalMediaProvidersManager;

use Illuminate\Http\Request;

class ContentController extends Controller {

	protected $manager;

	public function __construct(DigitalMediaProvidersManager $manager){
		$this->manager = $manager;
	}


  public function nadspodcast()
	{
		$content = $this->manager->getPublishedContentFromProvider('libsyn');

		return view('home\home', ['feed'=>$this->filterByTitle($content, 'NAD Podcast'), 'channelid'=>env('YT_PUB_KEY')]);
	}

	public function happyhalfhour()
	{
		$content = $this->manager->getPublishedContentFromProvider('libsyn');

		return view('home\home', ['feed'=>$this->filterByTitle($content, 'Happy Half Hour'), 'channelid'=>env('YT_PUB_KEY')]);
	}

	private static function filterByTitle($content, $title){
		if(is_null($title) || strlen($title) < 1){
			throw ('Title filter is required.');
		}

		if(is_null($content) || count($content) < 1){
			throw ('Content array is required.');
		}

		return array_filter($content, function($item) use($title){
			return strpos($item->title, $title) !== false;
		});
	}
}
