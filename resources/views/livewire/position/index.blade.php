<div>
    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <div class="mb-6">
        <div class="max-w-md">
            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Search Positions</label>
            <input type="text"
                   id="search"
                   wire:model.live.debounce.300ms="search"
                   placeholder="Search by name or description..."
                   class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
        </div>
    </div>

    <!-- Positions Table -->
    <div class="overflow-hidden shadow ring-1 ring-black dark:ring-gray-600 ring-opacity-5 dark:ring-opacity-25 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
            <thead class="bg-gray-50 dark:bg-zinc-700">
                <tr>
                    <th wire:click="sort('name')"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center space-x-1">
                            <span>Name</span>
                            @if($sortBy === 'name')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th wire:click="sort('description')"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center space-x-1">
                            <span>Description</span>
                            @if($sortBy === 'description')
                                @if($sortDirection === 'asc')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                @endif
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-gray-600">
                @forelse($this->positions as $position)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                            {{ $position->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ $position->description ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('positions.edit', $position) }}"
                                   class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                                    Edit
                                </a>
                                <button wire:click="delete({{ $position->id }})"
                                        wire:confirm="Are you sure you want to delete this position?"
                                        class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                            @if($search)
                                No positions found matching "{{ $search }}".
                            @else
                                No positions found. <a href="{{ route('positions.create') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Add your first position</a>.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($this->positions->hasPages())
        <div class="mt-6">
            {{ $this->positions->links() }}
        </div>
    @endif
</div>