<div>
    <form class="my-6 w-full space-y-6">
        <flux:input wire:model="firstName" label="First Name" type="text" autofocus required/>
        <flux:input wire:model="lastName" label="Last Name" type="text" />
        <flux:input wire:model="phone" label="Phone" type="text" />
        <flux:input wire:model="address" label="Address" type="text" />
        <flux:input wire:model="city" label="City" type="text" />
        <flux:input wire:model="state" label="State" type="text" />
        <flux:input wire:model="zip" label="Zip" type="text" />
        <flux:select wire:model="country" label="Country" variant="listbox" searchable placeholder="Choose country">
            @foreach($countries as $key => $value)
                <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:input wire:model="birthDate" label="Birth Date" type="date" />
        <flux:input wire:model="birthPlace" label="Birth Place" type="text" />
        <flux:input wire:model="email" label="Email" type="email" />
        <flux:radio.group wire:model="gender" label="Gender">
            <flux:radio value="m" label="Male" />
            <flux:radio value="f" label="Female" />
        </flux:radio.group>
        <flux:checkbox wire:model="isActive" label="Active?" />
        <flux:input wire:model="baptismDate" label="Baptism Date" type="date" />
        <flux:radio.group wire:model="maritalStatus" label="Marital Status">
            <flux:radio value="single" label="Single" />
            <flux:radio value="married" label="Married" />
            <flux:radio value="widowed" label="Widowed" />
            <flux:radio value="divorced" label="Divorced" />
        </flux:radio.group>
    </form>
</div>
