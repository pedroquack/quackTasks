
@extends('site.navbar')
@section('content')
    <div class="login container">
        <form class="form" action="{{ route('login') }}" method="post">
            @csrf
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Lembre de mim</label>
            </div>
            <button type="submit" class="orange-button button">Entrar</button>
        </form>
    </div>
@endsection

