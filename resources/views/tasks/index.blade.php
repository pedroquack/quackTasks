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
                @foreach ($categories as $cat)
                <div x-data="{isOpen: true}">
                    <div class="category-dropdown-button" @click="isOpen = !isOpen">
                        <span>{{ $cat->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="currentColor" :class="{'rotate-90': isOpen}"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
                    </div>
                    <div x-show="isOpen" x-collapse class="category-tasks">
                        @foreach ($cat->tasks as $task)
                            @livewire('task', ['task' => $task])
                        @endforeach
                    </div>
                </div>
                @endforeach
        </div>
</x-app-layout>
