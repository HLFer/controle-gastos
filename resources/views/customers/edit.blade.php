@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Cliente</div>
                    <div class="panel-body">

                        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                            {!! Form::token() !!}
                            @include('customers.partials.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
