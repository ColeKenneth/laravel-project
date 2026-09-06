<div>
    <div class="flex flex-col items-center justify-center space-y-4">
        <h1 class="text-2xl font-semibold text-gray-900">Employee Form</h1>
        <h2 class="text-xl font-regular text-gray-900 pb-3">Create an Employee Record.</h2>
    </div>

    <form wire:submit="save" novalidate class="overflow-hidden rounded-lg bg-white shadow-xl ring-1 ring-gray-200">
        <div class="grid grid-cols-1 gap-x-8 gap-y-7 p-8 sm:grid-cols-2 lg:p-10">

            <div>
                <label for="employeeNumber" class="block text-sm font-medium text-gray-700">
                    Employee Number
                </label>

                <input
                    id="employeeNumber"
                    type="text"
                    wire:model.live="employeeNumber"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('employeeNumber')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-700">
                    Position
                </label>

                <input
                    id="position"
                    type="text"
                    wire:model.live="position"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('position')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700">
                    First Name
                </label>

                <input
                    id="firstName"
                    type="text"
                    wire:model.live="firstName"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('firstName')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lastName" class="block text-sm font-medium text-gray-700">
                    Last Name
                </label>

                <input
                    id="lastName"
                    type="text"
                    wire:model.live="lastName"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('lastName')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    wire:model.live="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phoneNumber" class="block text-sm font-medium text-gray-700">
                    Phone
                </label>

                <input
                    id="phoneNumber"
                    type="tel"
                    wire:model.live="phoneNumber"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('phoneNumber')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="hiredAt" class="block text-sm font-medium text-gray-700">
                    Hire Date
                </label>

                <input
                    id="hiredAt"
                    type="date"
                    wire:model.live="hiredAt"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('hiredAt')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="border-t border-gray-100 bg-gray-50 px-8 py-5 lg:px-10">
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 disabled:opacity-50"
            >
                <span wire:loading.remove wire:target="save">
                    Save Employee
                </span>

                <span wire:loading wire:target="save">
                    Saving...
                </span>
            </button>
        </div>
    </form>
</div>
