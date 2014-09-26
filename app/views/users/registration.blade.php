@extends ('layouts/default')

@section('content')

{{Form::open(['method'=>'POST', 'action'=>'UserController@SaveRegistration'])}}
 @if($errors->has('email'))
    <div class="form-group has-error">
 @else
    <div class="form-group">
 @endif
    {{Form::label('email', 'Email Address')}}
    {{Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'test@gmail.com'])}}
</div>
 
 @if($errors->has('username'))
    <div class="form-group has-error has-feedback">
        <p class="text-danger">{{$errors->first('username')}}</p>
 @else
    <div class="form-group">   
 @endif
    {{Form::label('username', 'User Name')}}
    {{Form::text('username', null, ['class'=>'form-control'])}}
 @if($errors->has('username'))
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
 @endif
</div>
 
 @if($errors->has('password'))
    <div class="form-group has-error">
 @else
    <div class="form-group">
 @endif    {{Form::label('password', 'Password')}}
    {{Form::password('password',  ['class'=>'form-control'])}}
</div>
 
 @if($errors->has('confpassword'))
    <div class="form-group has-error">
 @else
    <div class="form-group">
 @endif
    {{Form::label('confpassword', 'Confirm Password')}}
    {{Form::password('confpassword',  ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('firstname', 'First Name')}}
    {{Form::text('firstname', null,  ['class'=>'form-control'])}}
</div>
 @if($errors->has('captcha'))
    <div class="form-group has-error">
 @else
    <div class="form-group">
 @endif
    <div id="captchawrapper">
        {{Form::label('captcha', 'Enter Text in the image')}}
        {{HTML::image(Captcha::img(), 'Captcha Image')}}
    </div>
    {{Form::password('captcha', ['class'=>'form-control'])}}
</div>
{{Form::button('Save', ['type'=>'submit', 'class' => 'btn btn-default'])}}
{{Form::close()}}

@stop
