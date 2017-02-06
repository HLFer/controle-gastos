@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Clientes
                            <a href="{{ route('customers.create') }}" class="btn btn-primary btn btn-sm pull-right">Adicionar Cliente</a>
                        </h4>

                    </div>
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
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td class="actions">
                                            {!! Form::open(['method' => 'Delete', 'route' => ['customers.destroy', $customer->id]]) !!}
                                                <a href="{{ route('customers.show', ['id' => $customer->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <button type="submit" onclick="return confirm(&quot;Tem certeza que deseja excluir este cliente?&quot;)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
