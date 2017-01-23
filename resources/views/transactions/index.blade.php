@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Financeiro
                        </h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::model(null, ['route' => ['transactions.store'], 'method' => 'post', 'class' => '']) !!}
                            {!! Form::token() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                                        {!! Form::label('customer_id', 'Cliente') !!}
                                        {!! Form::select('customer_id', $customers, null,['class' => 'form-control', 'placeholder' => 'Selecione o cliente...', 'required']) !!}
                                        @if ($errors->has('customer_id'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                        {!! Form::label('type', 'Tipo') !!}
                                        {!! Form::select('type', $types, null,['class' => 'form-control', 'required']) !!}

                                    @if ($errors->has('type'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                        {!! Form::label('date', 'Data') !!}
                                        {!! Form::text('date', date("d/m/Y"), ['class' => 'form-control date', 'required' ]) !!}
                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                        {!! Form::label('amount', 'Valor') !!}
                                        <div class="input-group">
                                            <div class="input-group-addon">R$</div>
                                            {!! Form::text('amount', null, ['class' => 'form-control decimal', 'required']) !!}
                                        </div>
                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        {!! Form::label('description', 'Descrição') !!}
                                        {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <a href="{{ route('transactions.index') }}" class="btn btn-default">Cancelar</a>
                                        {{Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                                    </div>
                                    <hr>
                                </div>

                            </div>
                        {!! Form::close() !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="alert alert-success">
                                    <h3>Entrada: <strong>R${{ $totalIn }}</strong></h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-danger">
                                    <h3>Saída: <strong>R${{ $totalOut }}</strong></h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-info">
                                    <h3>Total: <strong>R${{ $total }}</strong></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Cliente</th>
                                        <th>Valor</th>
                                        <th class="hidden-xs hidden-sm">Descrição</th>
                                        <th class="col-md-1">Ações</th>
                                    </tr>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr class="{{ ($transaction->type === 'S')? 'text-danger' : 'text-success' }}">
                                            <td><strong>{{ $transaction->date }}</strong></td>
                                            <td><strong>{{ $transaction->customer->name }}</strong></td>
                                            <td><strong><strong>R${{ $transaction->amount }}</strong></td>
                                            <td class="hidden-xs hidden-sm"><strong>{{ $transaction->description }}</strong></td>
                                            <td class="actions">
                                                {!! Form::open(['method' => 'Delete', 'route' => ['transactions.destroy', $transaction->id]]) !!}
                                                <button type="submit" onclick="return confirm(&quot;Tem certeza que deseja excluir este usuário?&quot;)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
