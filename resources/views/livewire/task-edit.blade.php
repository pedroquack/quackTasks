<div>
    <h1>Editar tarefa</h1>
    <form wire:submit.prevent='update'>
        <div class="form-group">
            <label for="nome">Nome da tarefa</label>
            <input type="text" wire:model="nome" id="nome" placeholder="Ex: Limpar a cozinha" class="@error('nome') error @enderror" value="{{ $task->name }}">
            @error('nome') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="form-group">
                <label for="data">Data de expiração <small>(opcional)</small></label>
                <input type="datetime-local" wire:model="data" id="data" class="@error('data') error @enderror" value="{{ $task->date }}">
                @error('data') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="prioridade">Prioridade</label>
                <select wire:model="prioridade" id="prioridade" class="@error('prioridade') error @enderror">
                    <option value="1" @if($task->priority === '1') selected @endif>Alta</option>
                    <option value="2" @if($task->priority === '2') selected @endif>Normal</option>
                    <option value="3" @if($task->priority === '3') selected @endif>Baixa</option>
                </select>
                @error('prioridade') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="create-task-button" type="submit">Editar tarefa</button>
    </form>
</div>
