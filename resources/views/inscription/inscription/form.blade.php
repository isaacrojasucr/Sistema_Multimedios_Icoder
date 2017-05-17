<div class="form-group">
    <label>Nombre del Deporte</label>
    <input type="hidden" id="sport" value=""/>
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Categoria', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('Categorias', ['1'=>'Infantil','2'=>'Juvenil' ], null,['class' => 'form-control']) !!}}
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('proof') ? 'has-error' : ''}}">
    {!! Form::label('proof', 'Prueba', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('Pruebas', ['1'=>'100 mts','2'=>'200 mts', '3'=>'400 mts' ], null,['class' => 'form-control']) !!}}
        {!! $errors->first('proof', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pase_cantonal') ? 'has-error' : ''}}">
    {!! Form::label('pase_cantonaSSl', 'Pase Cantonal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('pase', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pase_cantonal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div >
    <input type="hidden" id="edition" value=""/>
</div>

