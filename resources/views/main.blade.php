<x-app-layout>
        <div class="main-margin">
            <div class="main-container">
                <img class="main-image" src="{{ asset('img/main-img.jpg') }}" alt="Mulher segurando um tablet enquanto verifica suas tarefas.">
                <div class="main-content">
                    <h1 class="main-content-title">Bem-vindo ao quackTasks</h1>
                    <p class="main-content-paragraph">Organize sua vida com facilidade. Agende tarefas, receba lembretes e aumente sua produtividade!</p>
                    <a class="main-content-button" href="{{ route('register') }}">Comece agora!</a>
                </div>
            </div>
        </div>
</x-app-layout>
