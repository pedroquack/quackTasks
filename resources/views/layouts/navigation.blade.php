<nav class="navbar-container">
    <a href="/" class="navbar-logo">
        quackTasks
    </a>
    <div>
        @auth
            <form action="{{ route('logout') }}" method="post" class="form">
                @csrf
                <button type="submit" class="nav-item">Sair</button>
            </form>
        @else
            <div class="navbar-items">
                <a href="{{ route('register') }}" class="nav-item">Criar conta</a>
                <a href="{{ route('login') }}" class="nav-item">Entrar</a>
            </div>
        @endauth
    </div>
</nav>
