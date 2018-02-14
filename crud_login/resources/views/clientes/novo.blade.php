@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Clientes
                	<a class="nav navbar-nav pull-right" href="{{url('clientes')}}">Listar Clientes</a>
                </div>

                <div class="card-body">
                    @if (session('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ session('mensagem_sucesso') }}
                        </div>
                    @endif

                    @if(Request::is('*/editar'))
                        {{Form::model($cliente, ['method' => 'PATCH', 'url' => 'clientes/'.$cliente->id])}}
                    @else
                        {{Form::open(['url' => 'clientes/salvar'])}}
                    @endif

                                {!! Form::label('nome', 'Nome') !!}
                                {{Form::input('text', 'nome', null, ['class'=> 'form-control' , 'autofocus', 'placeholder'=>'Nome'])}}
                    <!--   <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Nome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                       </div> -->
                                {!! Form::label('endereco', 'Endereço') !!}
                                {{Form::input('text', 'endereco', null, ['class'=> 'form-control' , '', 'placeholder'=>'Endereço'])}}
                                {!! Form::label('telefone','Telefone') !!}
                                {{Form::input('text', 'telefone', null, ['class'=> 'form-control' , '', 'placeholder'=>'Telefone'])}}
                                {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
