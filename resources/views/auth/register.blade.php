<x-app-layout>
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf
        <h2 class="auth-form-title">Criar uma conta</h2>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="auth-form-input @error('name')error @enderror" value="{{ old('name') }}">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
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
        <button type="submit" class="auth-form-button">
            Confirmar
        </button>
        <small class="auth-form-link">Já tem uma conta? <a href="{{ route('login') }}">Entrar</a></small>
    </form>
</x-app-layout>
