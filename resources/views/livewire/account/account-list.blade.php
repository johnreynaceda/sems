<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-600">LIST OF USERS</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the user's account.</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            {{-- <x-button label="New Grade Level" amber class="font-bold" href="{{ route('admin.grade-add') }}"
                right-icon="plus" /> --}}
        </div>
    </div>
    <div class="mt-5 relative">
        {{ $this->table }}
    </div>
</div>
