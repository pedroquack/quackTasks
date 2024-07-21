<x-app-layout>
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf
        <h2 class="auth-form-title">Entrar</h2>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="auth-form-input @error('email') error @enderror" value="{{ old('email') }}">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="auth-form-input @error('password') error @enderror">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-checkbox-group">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Lembrar de mim</label>
        </div>
        <button type="submit" class="auth-form-button">
            Confirmar
        </button>
        <small class="auth-form-link">Ainda não é registrado? <a href="{{ route('register') }}">Criar uma conta</a></small>
    </form>
</x-app-layout>
