@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Usuários</h4></div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th class="col-md-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {!! Form::open(['method' => 'Delete', 'route' => ['users.destroy', $user->id]]) !!}
                                                <div class="btn-group  btn-group-sm" role="group" aria-label="">
                                                    {{ link_to_route('users.show', 'Visualizar', ['id' => $user->id],  ['class' => 'btn btn-default']) }}
                                                    {{ link_to_route('users.edit', 'Editar', ['id' => $user->id],  ['class' => 'btn btn-default']) }}
                                                    {!! Form::submit('Excluir', [
                                                        'class' => 'btn btn-default',
                                                        'onClick' => 'return confirm("Tem certeza que deseja excluir este usuário?")'
                                                    ]) !!}
                                                </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
