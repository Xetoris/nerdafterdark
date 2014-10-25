@if($error)
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
