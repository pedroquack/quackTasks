@extends('site.navbar')
@section('content')
    <div id="modalCreateTask" class="modal modal-lg fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="header mb-3">
                        <h3 class="modal-title text-center">Nova tarefa</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    @livewire('task_create', ['user_id' => Auth::user()->id, 'categories' => $categories])
                </div>
            </div>
        </div>
    </div>

    <div class="task_container">
        <div class="adsense">
            ad
        </div>
        <div class="tasks_div">
            <div class="header">
                <h1 class="title">Suas tarefas</h1>
                <button type="button" class="orange-button button" data-bs-toggle="modal" data-bs-target="#modalCreateTask">
                    +
                </button>
            </div>
            <div class="body">
                @can('HasTask', 'App\Models\Task')
                    @foreach ($categories as $cat)
                        @if ($cat->tasks->count() > 0)
                            <div class="break"></div>
                            <div class="accordion" id="category_drop{{ $cat->id }}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne{{ $cat->id }}" aria-expanded="true"
                                            aria-controls="collapseOne{{ $cat->id }}">
                                            <h2 class="category_title">{{ $cat->name }}</h2>
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{ $cat->id }}" class="accordion-collapse collapse show"
                                        data-bs-parent="#category_drop{{ $cat->id }}">
                                        <div class="accordion-body">
                                            @foreach ($cat->tasks->sortByDesc('priority')->sortByDesc('date')->sortBy('completed') as $task)
                                                @can('NoCategoryTask', $task)
                                                    @livewire('task', ['task' => $task, 'categories' => $categories])
                                                @endcan
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endcan
            </div>
        </div>
        <div class="adsense">
            ad
        </div>
    </div>
@endsection
