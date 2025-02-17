<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">User Details</h3>

                    <form method="POST" action="{{ route('admin.store-user') }}">
                        @csrf

                        <div>
                            <label for="name" class="block">Full Name</label>
                            <input id="name" type="text" name="name" required class="w-full px-4 py-2 border rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block">Email</label>
                            <input id="email" type="email" name="email" required class="w-full px-4 py-2 border rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block">Password</label>
                            <input id="password" type="password" name="password" required class="w-full px-4 py-2 border rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="role" class="block">Role</label>
                            <select id="role" name="role" required class="w-full px-4 py-2 border rounded-md">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
