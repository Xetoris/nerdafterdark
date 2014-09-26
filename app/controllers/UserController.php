<?php

class UserController extends BaseController{
    public function GetRegistrationForm(){
        return View::make('users/registration');
    }
    
    public function SaveRegistration(){
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
            'confpassword' => 'required_with:password',
            'email' => array('required', 'email'),            
            );
    }
}



