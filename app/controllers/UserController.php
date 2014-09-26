<?php

class UserController extends BaseController{
    public function GetRegistrationForm(){
        return View::make('users/registration');
    }
    
    public function SaveRegistration(){
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
}



