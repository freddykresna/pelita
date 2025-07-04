<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-gray-900">Members</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all of the members in your organizations.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add user
                </button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <flux:table :paginate="$this->members">
                        <flux:table.columns>
                            <flux:table.column sortable :sorted="$sortBy === 'first_name'" :direction="$sortDirection"
                                               wire:click="sort('first_name')">First Name
                            </flux:table.column>
                            <flux:table.column sortable :sorted="$sortBy === 'last_name'" :direction="$sortDirection"
                                               wire:click="sort('last_name')">Last Name
                            </flux:table.column>
                            <flux:table.column sortable :sorted="$sortBy === 'phone'" :direction="$sortDirection"
                                               wire:click="sort('phone')">Phone
                            </flux:table.column>
                        </flux:table.columns>
                        <flux:table.rows>
                            @foreach($this->members as $member)
                                <flux:table.row :key="$member->id">
                                    <flux:table.cell>{{ $member->first_name }}</flux:table.cell>
                                    <flux:table.cell>{{ $member->last_name }}</flux:table.cell>
                                    <flux:table.cell>{{ $member->phone }}</flux:table.cell>
                                    <flux:table.cell>
                                        <flux:dropdown position="bottom" align="end">
                                            <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>
                                            <flux:menu>
                                                <flux:menu.item icon="pencil-square">Edit</flux:menu.item>
                                                <flux:menu.separator />
                                                <flux:menu.item icon="trash" variant="danger">Delete</flux:menu.item>
                                            </flux:menu>
                                        </flux:dropdown>
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforeach
                        </flux:table.row>
                    </flux:table>
                </div>
            </div>
        </div>
    </div>
</div>
