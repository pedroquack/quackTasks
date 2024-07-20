<div>
    <h1>Criar uma tarefa</h1>
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <label for="nome">Nome da tarefa</label>
            <input type="text" wire:model="nome" id="nome" placeholder="Ex: Limpar a cozinha" class="@error('nome') error @enderror">
            @error('nome') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="form-group col-span-2 md:col-span-1">
                <label for="data">Data de expiração <small>(opcional)</small></label>
                <input type="datetime-local" wire:model="data" id="data" class="@error('data') error @enderror">
                @error('data') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-span-2 md:col-span-1">
                <label for="prioridade">Prioridade</label>
                <select wire:model="prioridade" id="prioridade" class="@error('prioridade') error @enderror">
                    <option value="1">Alta</option>
                    <option value="2" selected>Normal</option>
                    <option value="3">Baixa</option>
                </select>
                @error('prioridade') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="create-task-button" type="submit">Criar tarefa</button>
    </form>
</div>
