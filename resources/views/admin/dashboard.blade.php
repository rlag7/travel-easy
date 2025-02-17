<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Admin Panel</h3>

                    <div class="space-y-4">
                        <a href="{{ route('admin.users') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Manage Users
                        </a>
                        <a href="{{ route('admin.customers') }}" class="bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-purple-600">
                            Manage Customers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

