<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
            $tbo = new TestBindingObject;
            return ModelBinder::BindObjectFromCollection($tbo, Input::all());
	}
}

        class TestBindingObject{
            var $Test = 'eNGwiSH';
            var $test2 = 'spanish';
            var $tOoTleS = 'BLARG';
        }


