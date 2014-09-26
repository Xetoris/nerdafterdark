@extends ('layouts/default')

@section('content')

{{Form::open(['method'=>'POST', 'action'=>'UserController@SaveRegistration'])}}
<div class="form-group">
    {{Form::label('email', 'Email Address')}}
    {{Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'test@gmail.com'])}}
</div>
<div class="form-group">
    {{Form::label('username', 'User Name')}}
    {{Form::text('username', null, ['class'=>'form-control'])}}
</div>    
<div class="form-group">
    {{Form::label('password', 'Password')}}
    {{Form::password('password',  ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('confpassword', 'Confirm Password')}}
    {{Form::password('confpassword',  ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('firstname', 'First Name')}}
    {{Form::text('firstname', null,  ['class'=>'form-control'])}}
</div>
<div class="form-group">
    <div id="captchawrapper">
        {{Form::label('captcha', 'Enter Text in the image')}}
        {{HTML::image(Captcha::img(), 'Captcha Image')}}
    </div>
    {{Form::password('captcha', ['class'=>'form-control'])}}
</div>
{{Form::submit('Save')}}
{{Form::close()}}

@stop
