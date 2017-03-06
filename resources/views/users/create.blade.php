@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Usuário</div>
                    <div class="panel-body">

                        {!! Form::model(null, ['route' => ['users.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        @include('users.partials.form')
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
