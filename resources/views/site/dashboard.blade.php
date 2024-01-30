@extends('site.navbar')
@section('content')
<section class="dashboard_section">
    <div class="dashboard container">
        <h2>Olá {{ explode(' ', Auth::user()->name)[0] }}</h2>
        <div class="dashboard_cards row">
            <div class="dashboard_card users col-lg-4 col-12">
                <div class="type">
                    <h5 class="title">Usuarios :</h5>
                    <span class="number">{{ $users->count() }}</span>
                </div>
            </div>
            <div class="dashboard_card tasks col-lg-4 col-12">
                <div class="type">
                    <h5 class="title">Tarefas :</h5>
                    <span class="number">{{ $tasks->count() }}</span>
                </div>
            </div>
            <div class="dashboard_card categories col-lg-4 col-12">
                <div class="type">
                    <h5 class="title">Categorias :</h5>
                    <span class="number">{{ $categories->count() }}</span>
                </div>
            </div>
        </div>
        <table class="table table_dashboard mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Tasks</th>
                </tr>
            </thead>
            <tbody class="body">
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->tasks->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
