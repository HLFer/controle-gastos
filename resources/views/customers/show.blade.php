@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Cliente: {{ $customer->name }}</h4></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <th>Nome </th>
                                    <td>{{ $customer->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email </th>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <th>CPF </th>
                                    <td>{{ $customer->document }}</td>
                                </tr>
                                <tr>
                                    <th>Data de aniversário </th>
                                    <td>{{ $customer->birth_date }}</td>
                                </tr>
                                <tr>
                                    <th>Criado em </th>
                                    <td>{{ $customer->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Modificado em </th>
                                    <td>{{ $customer->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <hr>
                            <div class="text-right">
                                <a href="{{ route('customers.index') }}" class="btn btn-default">Voltar</a>
                                <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-primary">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


