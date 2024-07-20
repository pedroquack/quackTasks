<x-app-layout>
    <div class="task-container">
        <div class="task-container-header">
            <h1>Suas tarefas</h1>
            <button class="task-container-header-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="currentColor"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </button>
        </div>
        <hr>
        <div class="task-container-content">
            <div x-data="{isOpen: true}" class="category-dropdown">
                <button type="button" @click="isOpen = !isOpen" class="category-dropdown-button">
                    <span>Categoria</span>
                    <svg :class="isOpen ? 'rotate-180' : 'rotate-0'" xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="currentColor"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>
                </button>
                <div x-cloak x-show="isOpen" class="category-tasks"
                    x-collapse>
                    <div class="task">
                        <div class="task-title">
                            <input type="checkbox" name="" id="">
                            <h2>Limpar a cozinha</h2>
                        </div>
                        <div class="task-desc">
                            <div class="task-actions">
                                <button class="task-delete-button"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                                <button class="task-edit-button"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></button>
                            </div>
                            <small class="task-time">Expira em 2 dias!</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
