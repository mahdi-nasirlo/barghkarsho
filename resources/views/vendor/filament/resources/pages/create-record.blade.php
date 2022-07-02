<x-filament::page class="filament-resources-create-record-page">
    <x-filament::form wire:submit.prevent="create">
        {{ $this->form }}

        <x-filament::form.actions :actions="$this->getCachedFormActions()" :full-width="$this->hasFullWidthFormActions()" />
    </x-filament::form>
</x-filament::page>
