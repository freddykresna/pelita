<div>
    <form wire:submit="save" class="space-y-6">
        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Position Information Section -->
        <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-3 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Position Information</h3>
            <div class="grid grid-cols-1 gap-4">
                <!-- Position Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Position Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           wire:model="name"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400"
                           placeholder="e.g., Senior Developer, Project Manager">
                    @error('name') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea id="description" 
                              wire:model="description"
                              rows="3"
                              class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400"
                              placeholder="Brief description of the position responsibilities..."></textarea>
                    @error('description') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-600">
            <button type="button" 
                    wire:click="cancel"
                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-zinc-800 hover:bg-gray-50 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                Cancel
            </button>
            <button type="submit" 
                    wire:loading.attr="disabled"
                    wire:target="save"
                    class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50">
                <span wire:loading.remove wire:target="save">Create Position</span>
                <span wire:loading wire:target="save">Creating...</span>
            </button>
        </div>
    </form>
</div>