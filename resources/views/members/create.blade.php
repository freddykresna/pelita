<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white dark:bg-zinc-800 shadow-sm rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                    Add New Member
                </h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Create a new member profile with their personal and contact information.
                </p>
            </div>
            
            <div class="p-6">
                <livewire:member.create />
            </div>
        </div>
    </div>
</x-layouts.app>