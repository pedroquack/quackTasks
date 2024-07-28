<div>
    <h1>Criar uma tarefa</h1>
    <form wire:submit.prevent='store'>
        <div class="form-group">
            <label for="name">Nome da tarefa</label>
            <input type="text" wire:model="name" id="name" placeholder="Ex: Limpar a cozinha"
                class="@error('name') error @enderror">
            @error('name') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select wire:model="category" id="category" class="@error('category') error @enderror">
                <option value="">Escolher categoria</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category') <span class="error-message">{{ $message }}</span> @enderror
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="form-group col-span-2 md:col-span-1">
                <label for="date">Data de expiração <small>(opcional)</small></label>
                <input type="datetime-local" wire:model="date" id="date" class="@error('date') error @enderror">
                @error('date') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-span-2 md:col-span-1">
                <label for="priority">Prioridade</label>
                <select wire:model="priority" id="priority" class="@error('priority') error @enderror">
                    <option value="1">Alta</option>
                    <option value="2" selected>Normal</option>
                    <option value="3">Baixa</option>
                </select>
                @error('priority') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="create-task-button" type="submit">Criar tarefa</button>
    </form>
</div>
