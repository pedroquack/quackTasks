<div x-data="{modalIsOpen: false}">
    <div @click="modalIsOpen = true">
        {{ $button }}
    </div>
    <div x-cloak x-show="modalIsOpen" class="modal" x-transition:leave.opacity.70 x-transition:enter.opacity.70>
        <div class="modal-content" @click.outside="modalIsOpen = false">
            {{ $content }}
        </div>
    </div>
</div>
