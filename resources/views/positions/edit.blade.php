<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white dark:bg-zinc-800 shadow-sm rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                    Edit Position: {{ $position->name }}
                </h1>
            </div>
            
            <div class="p-6">
                <livewire:position.edit :position="$position" />
            </div>
        </div>
    </div>
</x-layouts.app>