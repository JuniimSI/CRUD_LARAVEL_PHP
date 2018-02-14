@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Clientes
                	<a class="nav navbar-nav pull-right" href="{{url('clientes/novo')}}">Novo Cliente</a>
                </div>

                <div class="card-body">
                    @if (session('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ session('mensagem_sucesso') }}
                        </div>
                    @endif

                    Lista de CLientes
                    <div class="panel-body">
                        <table class="table">
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Opções</th>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->nome}}</td>
                                        <td>{{$cliente->endereco}}</td>
                                        <td>{{$cliente->telefone}}</td>
                                        <td>
                                            <a href="clientes/{{$cliente->id}}/editar" class="btn btn-primary btn-sm">Editar</a>
                                            {{Form::open(['method' => 'DELETE', 'url' => '/clientes/'.$cliente->id, 'style'=>'display: inline;'])}}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {{Form::close()}}
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
@endsection
