<div>
    <h1>Tarefa para expirar</h1>
    <h2>Olá {{ $task->user->name }}!</h2>
    <p>A data de expiração da tarefa: "{{ $task->name }}", está marcada para {{ $task->date->format('d/m/Y') }} ás {{ $task->date->format('H:i') }}, você já completou esta tarefa?</p>
</div>
