<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('middlename') ? 'has-error' : ''}}">
    {!! Form::label('middlename', 'Middlename', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('middlename', null, ['class' => 'form-control']) !!}
        {!! $errors->first('middlename', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    {!! Form::label('lastname', 'Lastname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_card') ? 'has-error' : ''}}">
    {!! Form::label('id_card', 'Id Card', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_card', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_card', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    {!! Form::label('mail', 'Mail', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mail', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
    {!! Form::label('height', 'Height', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('height', null, ['class' => 'form-control']) !!}
        {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('width') ? 'has-error' : ''}}">
    {!! Form::label('width', 'Width', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('width', null, ['class' => 'form-control']) !!}
        {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('blood') ? 'has-error' : ''}}">
    {!! Form::label('blood', 'Blood', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('blood', null, ['class' => 'form-control']) !!}
        {!! $errors->first('blood', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', 'Country', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('country', null, ['class' => 'form-control']) !!}
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
    {!! Form::label('birthday', 'Birthday', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
        {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    {!! Form::label('state', 'State', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('state', null, ['class' => 'form-control']) !!}
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('town') ? 'has-error' : ''}}">
    {!! Form::label('town', 'Town', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('town', null, ['class' => 'form-control']) !!}
        {!! $errors->first('town', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('role', null, ['class' => 'form-control']) !!}
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_card_front') ? 'has-error' : ''}}">
    +3
    {!! Form::label('id_card_front', 'Id Card Front', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('id_card_front', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_card_front', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_card_back') ? 'has-error' : ''}}">
    {!! Form::label('id_card_back', 'Id Card Back', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('id_card_back', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_card_back', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
