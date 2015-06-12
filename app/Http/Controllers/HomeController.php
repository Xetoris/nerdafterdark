<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DigitalMedia\Interfaces\DigitalMediaProvidersManager;

use Illuminate\Http\Request;

class HomeController extends Controller {

	protected $manager;

	public function __construct(DigitalMediaProvidersManager $manager){
		$this->manager = $manager;
	}

	public function index(){
		$content = $this->manager->getPublishedContent(10);
		usort($content, array("DigitalMedia\Models\BaseContentModel","sortDescendingByDate"));

		return view('home\home', ['feed'=>$content, 'channelid'=>env('YT_PUB_KEY')]);
	}
}
