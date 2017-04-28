<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('year', null, ['class' => 'form-control']) !!}
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('enable') ? 'has-error' : ''}}">
    {!! Form::label('enable', 'Enable', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('enable', null, ['class' => 'form-control']) !!}
        {!! $errors->first('enable', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('branch') ? 'has-error' : ''}}">
    {!! Form::label('branch', 'Branch', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('branch', ['M', 'F'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('branch', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sport_id') ? 'has-error' : ''}}">
    {!! Form::label('sport_id', 'Sport Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sport_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sport_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
