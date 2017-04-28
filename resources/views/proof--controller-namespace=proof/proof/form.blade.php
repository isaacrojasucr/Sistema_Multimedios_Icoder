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
</div><div class="form-group {{ $errors->has('cat_id') ? 'has-error' : ''}}">
    {!! Form::label('cat_id', 'Cat Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cat_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cat_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
