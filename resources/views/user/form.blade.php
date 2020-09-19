@extends('adminlte::page')

@section('title', 'Formulário de Produto')

@section('content_header')
    <h1>Formulário de Usuario</h1>
@stop

@section('content')
    @include('flash::message')

    <div class="card card-primary">
        @if (isset($user))
            {!! Form::model($user, ['url' => route('users.update', $user), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('users.store')]) !!}
        @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @error('descricao')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @error('estoque')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('preco')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop
