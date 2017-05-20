<div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
    {!! Form::label('height', 'Altura', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('height', null, ['class' => 'form-control']) !!}
        {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('width') ? 'has-error' : ''}}">
    {!! Form::label('width', 'Peso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('width', null, ['class' => 'form-control']) !!}
        {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('blood') ? 'has-error' : ''}}">
    {!! Form::label('blood', 'Tipo de Sangre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('blood',['1'=>'A+', '2'=>'A-', '3'=>'B+', '4'=>'B-', '5'=>'AB+', '6'=>'AB-', '7'=>'O+','8'=>'O-'] , null, ['class'=>'form-control']) !!}
        {!! $errors->first('blood', '<p class="help-block">:message</p>') !!}
    </div>
</div>

</div><div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    {!! Form::label('mail', 'Correo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mail', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Telefono', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Foto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('id_card_front') ? 'has-error' : ''}}">
    {!! Form::label('id_card_front', 'Frente de Cédula', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('id_card_front', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_card_front', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('id_card_back') ? 'has-error' : ''}}">
    {!! Form::label('id_card_back', 'Reverso de Cédula', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('id_card_back', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_card_back', '<p class="help-block">:message</p>') !!}
    </div>
</div>