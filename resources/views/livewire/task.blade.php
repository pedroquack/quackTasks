<div class="task_item">

    <div id="modalEditTask{{ $task->id }}" class="modal modal-lg fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="header mb-3">
                        <h3 class="modal-title text-center">Editar tarefa</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="formTask" action="{{ route('task.update', $task) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome da tarefa *</label>
                            <input type="text" name="newName"
                                class="form-control @if ($errors->has('newName')) error @endif"
                                value="{{ $task->name }}">
                            @if ($errors->has('newName'))
                                <div class="text-danger">{{ $errors->first('newName') }}</div>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-12 category_container">
                                <label for="category"class="form-label">Categoria</label>
                                <select name="newCategory_id" class="form-select" id="category">
                                    @foreach ($categories as $cat)
                                        <option @if ($task->category->id === $cat->id) selected @endif
                                            value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-6 col-12">
                                <label for="priority" class="form-label">Prioridade</label>
                                <select name="newPriority" class="form-select">
                                    <option value="1"@if ($task->priority == 1) selected @endif>Alta
                                    </option>
                                    <option value="2" @if ($task->priority == 2) selected @endif>Normal
                                    </option>
                                    <option value="3" @if ($task->priority == 3) selected @endif>Baixa
                                    </option>
                                </select>
                                @if ($errors->has('priority'))
                                    <div class="text-danger">{{ $errors->first('priority') }}</div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <h3 class="date_title">Prazo</h3>
                                <div class="date_inputs row">
                                    <div class="col-6 col-md-6 col-12">
                                        <label for="date" class="form-label date col-6">Data</label>
                                        <input type="date" id="date" class="form-control" name="newDate"
                                            value="{{ $taskDate }}">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 clock_container row">
                                        <div class="col-6">
                                            <label for="date" class="form-label hour">Hora</label>
                                            <select id="date_hour" class="form-select" name="newDate_hour">
                                                @for ($i = 0; $i <= 24; $i++)
                                                    <option @if ($i == $taskHour) selected @endif
                                                        value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="date" class="form-label min">Minuto</label>
                                            <select id="date_minute" class="form-select" name="newDate_min">
                                                @for ($i = 0; $i <= 59; $i++)
                                                    <option @if ($i == $taskMinute) selected @endif
                                                        value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 d-flex align-items-end justify-content-end">
                            <button class="orange-button button" type="submit">
                                Editar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <span class="task_title">- {{ $task->name }}</span>
    <div class="task_info">

        <div class="dropdown">
            <a class="task_options" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-gear-fill icon"></i>
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#modalEditTask{{ $task->id }}" data-bs-toggle="modal">Editar</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="{{ route('task.destroy',$task) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">Excluir</button>
                    </form>
                </li>
            </ul>
        </div>

        @if ($task->date && $task->completed == 0)
            <span class="@if (Carbon\Carbon::Parse($task->date)->diffInHours(now()) < 12 || $task->date < now()) text-danger @endif">
                @if ($task->date >= now())
                    Expira
                @else
                    Expirou
                @endif{{ $expirationTime }}
            </span>
        @elseif($task->completed == 1)
            <span>Completa</span>
        @else
            <span>Sem prazo</span>
        @endif
        <input class="task_completed" type="checkbox" wire:change="completeTask" wire:model="completed" value="1"
            {{ $completed ? 'checked' : '' }}>
    </div>
</div>
