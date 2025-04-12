<div>
    <form class="my-6 w-full space-y-6">
        <flux:input wire:model="name" label="Position Name" type="text" autofocus required/>
        <flux:input wire:model="description" label="Description" type="text" />
        <flux:button button>Cancel</flux:button>
        <flux:button variant="primary">Save</flux:button>
    </form>
</div>
