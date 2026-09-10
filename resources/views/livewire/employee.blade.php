<div>
    <div class="flex flex-col items-center justify-center space-y-4">
        <h1 class="text-2xl font-semibold text-gray-900">Employee Form</h1>
        <h2 class="text-xl font-regular text-gray-900 pb-3">Create an Employee Record.</h2>
    </div>

    <form wire:submit={{ $editingEmployeeId ? 'update' : 'save' }} novalidate class="overflow-hidden rounded-lg bg-white shadow-xl ring-1 ring-gray-200">
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

        <div class="border-t border-gray-100 bg-gray-50 px-8 py-5 lg:px-10 flex justify-end gap-3">
            @if ($editingEmployeeId)
            <button type="button" wire:click="cancelEdit">Cancel</button>
            @endif
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 disabled:opacity-50"
            >
                <span wire:loading.remove wire:target="save,update">
                    {{ $editingEmployeeId ? 'Update Employee' : 'Add Employee' }}
                </span>

                <span wire:loading wire:target="save">
                    Saving...
                </span>

                <span wire:loading wire:target="update">
                    Updating...
                </span>
            </button>
        </div>
    </form>

    <div class="mt-10 overflow-hidden rounded-lg bg-white shadow-xl ring-1 ring-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Employee Number
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Phone Number
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Position
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Hire Date
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($employees as $employee)
                <tr wire:key="employee-{{ $employee->id }}">
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                        {{ $employee->employee_number }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                        {{ $employee->email }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                        {{ $employee->phone_number }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                        {{ $employee->position }}
                    </td>
                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                        {{ $employee->hired_at->format('Y-m-d') }}
                    </td>

                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                        <button type="button" wire:click="edit({{ $employee->id }})"
                        class="font-medium hover:text-indigo-500">Edit</button>

                        <button type="button" wire:click="confirmDelete({{ $employee->id }})"
                        class="ml-4 font-medium hover:text-red-500">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                        No employees yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($showSuccessModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6">
        <div class="absolute inset-0 bg-gray-900/50"></div>

        <div class="relative w-full max-w-md overflow-hidden rounded-lg bg-white shadow-2xl">
            <div class="px-8 py-7 text-center">
                <h2 class="text-xl font-semibold text-gray-900">
                    Employee Saved
                </h2>

                <p class="mt-2 text-base text-gray-600">
                    The employee record was successfully saved.
                </p>
            </div>

            <div class="border-t border-gray-100 bg-gray-50 px-8 py-5">
                <button type="button" wire:click="closeSuccessModal"
                class="w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">OK</button>
            </div>
        </div>
    </div>
    @endif

    @if ($showDeleteModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6">
        <div class="absolute inset-0 bg-gray-900/50"></div>

        <div class="relative w-full max-w-md overflow-hidden rounded-lg bg-white shadow-2xl">
            <div class="px-8 py-7 text-center">
                <h2 class="text-xl font-semibold text-gray-900">
                    Delete Employee
                </h2>

                <p class="mt-2 text-base text-gray-600">
                    Are you sure you want to delete this employee?
                </p>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 bg-gray-50 px-8 py-5">
                <button
                    type="button"
                    wire:click="closeDeleteModal"
                    class="rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-gray-300 hover:bg-gray-50"
                >
                    Cancel
                </button>

                <button
                    type="button"
                    wire:click="delete"
                    wire:loading.attr="disabled"
                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500 disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="delete">
                        Delete
                    </span>

                    <span wire:loading wire:target="delete">
                        Deleting...
                    </span>
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
