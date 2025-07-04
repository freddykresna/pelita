<div>
    <form wire:submit="save" class="space-y-6">
        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Personal Information Section -->
        <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-3 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        First Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="first_name" 
                           wire:model="first_name"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('first_name') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Last Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="last_name" 
                           wire:model="last_name"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('last_name') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           wire:model="email"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('email') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                    <input type="text" 
                           id="phone" 
                           wire:model="phone"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('phone') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Gender</label>
                    <select id="gender" 
                            wire:model="gender"
                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                        <option value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    @error('gender') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Marital Status -->
                <div>
                    <label for="marital_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Marital Status</label>
                    <select id="marital_status" 
                            wire:model="marital_status"
                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                        <option value="">Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                    @error('marital_status') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Birth Date -->
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Birth Date</label>
                    <input type="date" 
                           id="birth_date" 
                           wire:model="birth_date"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('birth_date') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Birth Place -->
                <div>
                    <label for="birth_place" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Birth Place</label>
                    <input type="text" 
                           id="birth_place" 
                           wire:model="birth_place"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('birth_place') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
            </div>
        </div>

        <!-- Address Information Section -->
        <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-3 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Address Information</h3>
            <div class="grid grid-cols-1 gap-4">
                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                    <textarea id="address" 
                              wire:model="address"
                              rows="3"
                              class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400"></textarea>
                    @error('address') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- City -->
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">City</label>
                        <input type="text" 
                               id="city" 
                               wire:model="city"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                        @error('city') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- State/Province -->
                    <div>
                        <label for="state_province" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">State/Province</label>
                        <input type="text" 
                               id="state_province" 
                               wire:model="state_province"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                        @error('state_province') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- ZIP -->
                    <div>
                        <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">ZIP Code</label>
                        <input type="text" 
                               id="zip" 
                               wire:model="zip"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                        @error('zip') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Country</label>
                        <input type="text" 
                               id="country" 
                               wire:model="country"
                               class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                        @error('country') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Religious Information Section -->
        <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-3 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Religious Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Baptism Date -->
                <div>
                    <label for="baptism_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Baptism Date</label>
                    <input type="date" 
                           id="baptism_date" 
                           wire:model="baptism_date"
                           class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-zinc-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400">
                    @error('baptism_date') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
            </div>
        </div>

        <!-- Profile Picture Section -->
        <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-3 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Profile Picture</h3>
            
            <!-- Upload Picture -->
            <div>
                <label for="profile_picture" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Upload Picture
                </label>
                <input type="file" 
                       id="profile_picture" 
                       wire:model="profile_picture"
                       accept="image/*"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('profile_picture') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
                
                <!-- Preview -->
                @if($profile_picture)
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
                        @if($profile_picture->isPreviewable())
                            <img src="{{ $profile_picture->temporaryUrl() }}" 
                                 alt="Preview" 
                                 class="w-24 h-24 rounded-full object-cover border-2 border-gray-200">
                        @else
                            <p class="text-sm text-gray-500">File selected: {{ $profile_picture->getClientOriginalName() }}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-600">
            <button type="button" 
                    wire:click="cancel"
                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-zinc-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                Cancel
            </button>
            <button type="submit" 
                    wire:loading.attr="disabled"
                    wire:target="save"
                    class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50">
                <span wire:loading.remove wire:target="save">Create Member</span>
                <span wire:loading wire:target="save">Creating...</span>
            </button>
        </div>
    </form>
</div>