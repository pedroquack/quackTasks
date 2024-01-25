@extends('site.navbar')
@section('content')
    <div class="dashboard container">
        <div class="dashboard_cards row">
            <div class="dashboard_card users col-lg-4 col-12">
                <h5 class="title">Usuarios :</h5>
                <span class="number">{{ $users->count() }}</span>
            </div>
            <div class="dashboard_card tasks col-lg-4 col-12">
                <h5 class="title">Tarefas :</h5>
                <span class="number">{{ $tasks->count() }}</span>
            </div>
            <div class="dashboard_card categories col-lg-4 col-12">
                <h5 class="title">Categorias :</h5>
                <span class="number">{{ $categories->count() }}</span>
            </div>
        </div>
    </div>
@endsection
