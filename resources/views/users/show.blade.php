@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Usuário</h4></div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Nome:</dt>
                            <dd>{{ $user->name }}</dd>

                            <dt>Email:</dt>
                            <dd>{{ $user->email }}</dd>

                            <dt>Criado em:</dt>
                            <dd>{{ $user->created_at }}</dd>

                            <dt>Modificado em:</dt>
                            <dd>{{ $user->updated_at }}</dd>

                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
