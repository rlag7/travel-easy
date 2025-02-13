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
                    <!-- Create User Button -->
                    <div class="mb-4">
                        <a href="" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            {{ __('Create User') }}
                        </a>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">User Accounts</h3>

                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Registered</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $user->role }}</td>
                                <td class="border px-4 py-2">
                                    {{ $user->is_active ? 'Active' : 'Not Active' }}
                                </td>
                                <td class="border px-4 py-2">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="border px-4 py-2">
                                    <!-- Edit Button -->
                                    <a href="}" class="text-blue-500">Edit</a>

                                    <!-- Delete Button -->
                                    <form action="" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
