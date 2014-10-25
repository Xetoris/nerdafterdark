<?php

class UserController extends BaseController{
    public function GetRegistrationForm(){
        return View::make('users/registration');
    }

    public function SaveRegistration(){
        Validator::extend('username', function($field, $value, $parameters){
          return User::checkUesrnameUnique($value);
        });

        Validator::extend('email', function($field, $value, $parameters){
          return User::checkEmailUnique($value);
        });

        $validator = Validator::make(Input::all(), $this->SaveRegistrationValidation());

        if($validator->fails())
        {
            return Redirect::action('UserController@GetRegistrationForm')->withErrors($validator);
        }

        $user = new User();

        $user->username = Input::get('username');
        $user->password = Input::get('password');
        $user->email = Input::get('email');
        $user->first_name = Input::get('firstname');

        var_dump($user);
        print('|');

        print(Input::get('captcha'));
        exit();
    }

    private function SaveRegistrationValidation(){
        return array(
            'username' => array('required', 'min:6'),
            'password' => 'required',
            'confpassword' => array('required_with:password','same:password'),
            'email' => array('required', 'email'),
            );
    }
}
