<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nome', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
    {!! Form::label('days', 'Quantidade de Dias', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('days', null, ['class' => 'form-control', 'required']) !!}

          @if ($errors->has('days'))
            <span class="help-block">
                <strong>{{ $errors->first('days') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('distance') ? ' has-error' : '' }}">
    {!! Form::label('distance', 'Distância', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text('distance', null, ['class' => 'form-control decimal']) !!}
            <div class="input-group-addon">Km</div>
        </div>
        @if ($errors->has('distance'))
            <span class="help-block">
                <strong>{{ $errors->first('distance') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('altitude_gain') ? ' has-error' : '' }}">
    {!! Form::label('altitude_gain', 'Ganho de Altitude', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
            {!! Form::text('altitude_gain', null, ['class' => 'form-control decimal']) !!}
            <div class="input-group-addon">metros</div>
        </div>
        @if ($errors->has('altitude_gain'))
            <span class="help-block">
                <strong>{{ $errors->first('altitude_gain') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Descrição', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['rows' => 4, 'class' => 'form-control']) !!}

        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-12">
    <hr>
    <div class="text-right">
        <a href="{{ route('routes.index') }}" class="btn btn-default">Cancelar</a>
        {{Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
    </div>
</div>


