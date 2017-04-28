<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('enable') ? 'has-error' : ''}}">
    {!! Form::label('enable', 'Enable', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('enable', null, ['class' => 'form-control']) !!}
        {!! $errors->first('enable', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('year', null, ['class' => 'form-control']) !!}
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('place') ? 'has-error' : ''}}">
    {!! Form::label('place', 'Place', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('place', null, ['class' => 'form-control']) !!}
        {!! $errors->first('place', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('initial_date') ? 'has-error' : ''}}">
    {!! Form::label('initial_date', 'Initial Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('initial_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('initial_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('final_date') ? 'has-error' : ''}}">
    {!! Form::label('final_date', 'Final Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('final_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('final_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
