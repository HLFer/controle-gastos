@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Rotas
                            <a href="{{ route('routes.create') }}" class="btn btn-primary btn btn-sm pull-right">Adicionar Rota</a>
                        </h4>

                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade de Dias</th>
                                    <th class="col-md-1">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($routes as $route)
                                    <tr>
                                        <td>{{$route->name}}</td>
                                        <td>{{$route->days}}</td>
                                        <td class="actions">
                                            {!! Form::open(['method' => 'Delete', 'route' => ['routes.destroy', $route->id]]) !!}
                                                <a href="{{ route('routes.show', ['id' => $route->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('routes.edit', ['id' => $route->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <button type="submit" onclick="return confirm(&quot;Tem certeza que deseja excluir esta rota?&quot;)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $routes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
