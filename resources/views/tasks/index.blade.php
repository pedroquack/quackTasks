<x-app-layout>
    <div class="task-container">
        <div class="task-container-header">
            <h1>Suas tarefas</h1>
            <x-modal>
                <x-slot:button>
                    <button class="task-container-header-button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px"
                            fill="currentColor">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                    </button>
                </x-slot:button>
                <x-slot:content>
                    @livewire('task-create')
                </x-slot:content>
            </x-modal>
        </div>
        <hr>
        <div class="task-container-content">
            <div class="category-tasks">
                @foreach ($tasks as $task)
                    @livewire('task', ['task' => $task])
                @endforeach
            </div>
        </div>
</x-app-layout>
