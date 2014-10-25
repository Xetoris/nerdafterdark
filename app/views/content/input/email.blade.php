@if($error)
<div class="form-group has-error">
@else
<div class="form-group">
@endif
    <div class="container">
        <div class="row">
            {{ Form::label($name, $label, ['class' => 'col-xs-2 control-label', 'style' => 'padding-left:0px;']) }}
        </div>
        <div class="row">
            <div class="contrainer input-sizer col-xs-8" style="padding-left:0px;">
                {{ Form::email($name, null, ['class'=>'form-control', 'id' => $name, 'placeholder'=>'test@gmail.com']) }}
            </div>
        </div>
    </div>
</div>
