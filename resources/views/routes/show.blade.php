@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Rota: {{ $route->name }}</h4></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <th>Nome </th>
                                    <td>{{ $route->name }}</td>
                                </tr>
                                <tr>
                                    <th>Quantidade de dias </th>
                                    <td>{{ $route->days }}</td>
                                </tr>
                                <tr>
                                    <th>Distância </th>
                                    <td>{{ $route->distance }} Km</td>
                                </tr>
                                <tr>
                                    <th>Ganho de Altitude </th>
                                    <td>{{ $route->altitude_gain }} metros</td>
                                </tr>
                                <tr>
                                    <th>Descrição </th>
                                    <td>{{ $route->description }}</td>
                                </tr>
                                <tr>
                                    <th>Criado em </th>
                                    <td>{{ $route->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Modificado em </th>
                                    <td>{{ $route->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <hr>
                            <div class="text-right">
                                <a href="{{ route('routes.index') }}" class="btn btn-default">Voltar</a>
                                <a href="{{ route('routes.edit', ['id' => $route->id]) }}" class="btn btn-primary">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


