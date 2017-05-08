<div class="form-group {{ $errors->has('sport') ? 'has-error' : ''}}">
    {!! Form::label('sport', 'Sport', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sport', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sport', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('category', null, ['class' => 'form-control']) !!}
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('proof') ? 'has-error' : ''}}">
    {!! Form::label('proof', 'Proof', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('proof', null, ['class' => 'form-control']) !!}
        {!! $errors->first('proof', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('inscription') ? 'has-error' : ''}}">
    {!! Form::label('inscription', 'Inscription', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('inscription', null, ['class' => 'form-control']) !!}
        {!! $errors->first('inscription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pase_cantonal') ? 'has-error' : ''}}">
    {!! Form::label('pase_cantonal', 'Pase Cantonal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pase_cantonal', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pase_cantonal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('edition') ? 'has-error' : ''}}">
    {!! Form::label('edition', 'Edition', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('edition', null, ['class' => 'form-control']) !!}
        {!! $errors->first('edition', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
