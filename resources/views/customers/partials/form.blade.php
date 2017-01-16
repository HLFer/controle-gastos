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

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}

          @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
    {!! Form::label('document', 'CPF', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('document', null, ['class' => 'form-control']) !!}

        @if ($errors->has('document'))
            <span class="help-block">
                <strong>{{ $errors->first('document') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    {!! Form::label('birth_date', 'Data de Aniversário', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('birth_date', null, ['class' => 'form-control']) !!}

        @if ($errors->has('birth_date'))
            <span class="help-block">
                <strong>{{ $errors->first('birth_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-12">
    <hr>
    <div class="text-right">
        <a href="{{ route('customers.index') }}" class="btn btn-default">Cancelar</a>
        {{Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
    </div>
</div>


