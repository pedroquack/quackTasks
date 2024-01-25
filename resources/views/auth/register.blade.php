@extends('site.navbar')
@section('content')
    <div class="register container">
        <form class="form" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control @if ($errors->has('name')) error @endif" id="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <div class="text-danger">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Endereço de E-mail</label>
                <input type="email" name="email" class="form-control @if ($errors->has('email')) error @endif" id="email" placeholder="exemplo@gmail.com" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="text-danger">{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control @if ($errors->has('password')) error @endif" id="password">
                @if ($errors->has('password'))
                    <div class="text-danger">{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmação de senha</label>
                <input type="password" name="password_confirmation" class="form-control @if ($errors->has('password_confirmation')) error @endif" id="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
                @endif
            </div>
            <button type="submit" class="orange-button button">Cadastrar</button>
            <small class="already-registered"><a class="link" href="{{ route('login') }}">Já é cadastrado?</a></small>
        </form>
    </div>
@endsection

