@extends('site.navbar')
@section('content')
    <main>
        <div class="banner container row">
            <div class="image col-lg-8 d-none d-lg-block">
                <img class="img" src="{{ asset('img/banner_img.jpg') }}" alt="">
            </div>
            <div class="info col-lg-4">
                <h1 class="title">Bem-vindo ao quackTasks</h1>
                <p class="desc">Organize sua vida com facilidade. Agende tarefas, receba lembretes e aumente sua
                    produtividade.</p>
                <a href="" class="button orange-button">Comece agora!</a>
            </div>
        </div>
    </main>
    <section class="benefits-section">
        <div class="benefits container">
            <h2 class="title">Beneficios do quackTasks</h2>
            <div class="benefit">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                    class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path
                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                </svg>
                <span>Aumente a produtividade com o agendamento eficiente de tarefas.</span>
            </div>
            <div class="benefit">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                    class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path
                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                </svg>
                <span>Receba lembretes para nunca mais esquecer uma tarefa importante.</span>
            </div>
            <div class="benefit">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                    class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path
                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                </svg>
                <span>Categorize suas tarefas e priorize oque for mais importante para você.</span>
            </div>
        </div>
    </section>
@endsection
