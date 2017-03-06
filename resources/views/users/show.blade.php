@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Usuário: {{ $user->name }}</h4></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <th>Nome </th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email </th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Criado em </th>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Modificado em </th>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <hr>
                            <div class="text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-default">Voltar</a>
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


