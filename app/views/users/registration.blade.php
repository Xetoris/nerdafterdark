@extends ('layouts/default')

@section('content')

@if($errors->any())
  <div id='registration-errors' class='bg-danger'>
    <span>Error saving form:</span>
    <ul class='list-styled'>
      @foreach($errors->all() as $value)
        <li>{{$value}}</li>
      @endforeach
    </ul>
  </div>
@endif

{{Form::open(['class' => '.form-horizontal registration-form','method'=>'POST', 'action'=>'UserController@SaveRegistration'])}}
 @include('content/input/email', array('name' => 'email', 'label' => 'Email Address', 'error' => $errors->has('email')))
 @include('content/input/textbox', array('name' => 'username', 'label' => 'User Name', 'error' => $errors->has('username')))
 @include('content/input/password', array('name' => 'password', 'label' => 'Password', 'error' => $errors->has('password')))
 @include('content/input/password', array('name' => 'confpassword', 'label' => 'Confirm Password', 'error' => $errors->has('confpassword')))
 @include('content/input/textbox', array('name' => 'firstname', 'label' => 'First Name', 'error' => $errors->has('firstname')))
 @include('content/input/captcha', array('error' => $errors->has('captcha')))
 {{Form::button('Save', ['type'=>'submit', 'class' => 'btn btn-default'])}}
{{Form::close()}}

@stop
