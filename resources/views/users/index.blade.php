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
                                    <th class="col-md-1">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="actions">
                                            {!! Form::open(['method' => 'Delete', 'route' => ['users.destroy', $user->id]]) !!}
                                                <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <button type="submit" onclick="return confirm(&quot;Tem certeza que deseja excluir este usuário?&quot;)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
