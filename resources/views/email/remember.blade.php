<div class="title">
    <h1>Olá {{ explode(' ',$task->user->name)[0] }}</h1>
    <h2>Viemos te notificar sobre uma tarefa</h2>
</div>
<div class="body">
    Faltam poucas horas para a tarefa "{{ $task->name }}" expirar.
</div>
