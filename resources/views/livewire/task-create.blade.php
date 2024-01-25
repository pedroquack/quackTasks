<div>
    <form wire:submit.prevent="createTask" class="formTask" method="post">
        @csrf
        <input type="hidden" name="user_id" value="user_id" wire:model="user_id">
        <div class="mb-3">
            <label for="name" class="form-label">Nome da tarefa *</label>
            <input wire:model="name" type="name" name="name"
                class="form-control @if ($errors->has('name')) error @endif" id="name"
                placeholder="Ex: Arrumar a casa" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="addMoreTask mb-3">
            <a href="#moreTask" class="addMoreTaskA" type="button" data-bs-toggle="collapse" data-bs-target="#moreTask"
                aria-expanded="false" aria-controls="moreTask">
                Exibir mais opções
                <span class="arrow material-symbols-outlined">
                    arrow_drop_down
                </span>
            </a>
        </div>
        <div class="collapse" id="moreTask">
            <hr>
            <div class="row">
                <div class="mb-3 col-lg-6 col-12 category_container">
                    <label for="category"class="form-label">Categoria</label>
                    <select wire:model="category_id" class="form-select" name="category" id="category">
                        <option value="create_category">Criar categoria</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-lg-6 col-12">
                    <label for="priority" class="form-label">Prioridade</label>
                    <select wire:model="priority" class="form-select" name="priority">
                        <option value="1">Alta</option>
                        <option value="2" selected>Normal</option>
                        <option value="3">Baixa</option>
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
                            <input type="date" name="data" id="date" class="form-control" wire:model="date">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 clock_container row">
                            <div class="col-6">
                                <label for="date" class="form-label hour">Hora</label>
                                <select id="date_hour" class="form-select" wire:model="date_hour">
                                    @for ($i = 0; $i <= 24; $i++)
                                        <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="date" class="form-label min">Minuto</label>
                                <select id="date_minute" class="form-select" wire:model="date_min">
                                    @for ($i = 0; $i <= 59; $i++)
                                        <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-3 d-flex align-items-end justify-content-end">
            <button class="orange-button button">
                Adicionar
            </button>
        </div>
    </form>
</div>
<script>
    let select = document.querySelector('#category');
    select.addEventListener('change', (event) => {
        let input = document.createElement('input');
        let container = document.querySelector('.category_container');
        let category_input = document.querySelector('.category_input')
        if (select.value === 'create_category') {
            if (!category_input) {
                input.type = 'text';
                input.className =
                    "form-control @if ($errors->has('category_name')) error @endif mt-3 category_input"
                input.setAttribute('wire:model', "category_name");
                input.placeholder = 'Nome da categoria'
                container.appendChild(input);
            }
        } else if (select.value !== 'create_category') {
            container.removeChild(category_input);
        }
    });
</script>
<script>
    let collapse = document.querySelector('.addMoreTaskA');
    let aria = collapse.getAttribute("aria-expanded");
    let arrow = document.querySelector('.arrow');
    collapse.addEventListener('click', (event) => {
        aria = collapse.getAttribute("aria-expanded");
        if (aria === "true") {
            collapse.textContent = "Exibir menos opções"
            collapse.appendChild(arrow);
            arrow.textContent = 'arrow_drop_up'
        } else {
            collapse.textContent = 'Exibir mais opções'
            collapse.appendChild(arrow);
            arrow.textContent = 'arrow_drop_down'
        }
    })
    window.addEventListener('categoryError' event =>{
        alert('Erro');
    });
</script>
