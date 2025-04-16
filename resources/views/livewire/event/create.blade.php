<div>
    <form class="my-6 w-full space-y-6">
        <flux:input wire:model="name" label="Event Name" type="text" autofocus required/>
        <flux:input wire:model="description" label="Description" type="text" />
        <flux:date-picker wire:model="date" label="Event Date" />
        <flux:checkbox wire:model="isPublic" label="Public Event" />
        <flux:button button>Create</flux:button>
    </form>
</div>
