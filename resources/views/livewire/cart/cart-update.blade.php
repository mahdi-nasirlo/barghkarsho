<div>
    <input wire:model="quantity" type="number" min="1" max="{{ $inventory }}" wire:change="updateCart"
        class="text-center bg-gray-100">
</div>
