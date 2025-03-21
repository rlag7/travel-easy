<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<<<<<<< HEAD
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Search Filter (on the left) -->
                    <div class="mb-4 flex justify-between items-center">
                        <div class="w-1/3">
                            <input type="text" id="searchInput" placeholder="Search users..." class="w-full px-4 py-2 border rounded-md">
                        </div>

                        <!-- Add Account Button (on the right) -->
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Add Account
                        </a>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">User Accounts</h3>

                    @if ($users->isEmpty())
                        <p class="text-gray-500">No Users Found</p>
                    @else
                        <table class="w-full text-left border-collapse" id="userTable">
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
                                        <a href="#" class="text-blue-500 mr-2">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="#" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
=======

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">
                        Manage Users
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Browse and check all user registered in the system
                    </p>
                    <a href="{{ route('admin.users') }}" class="text-blue-500 hover:underline">
                        View all Users &rarr;
                    </a>
                </div>

                <!-- Second Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">
                        Manage Customers
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Browse and check all Customer registered in the system
                    </p>
                    <a href="{{ route('admin.customers.index') }}" class="text-blue-500 hover:underline">
                        View all Customers &rarr;
                    </a>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">
                        Manage Bookings
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Browse and check all Booked bookings in the system
                    </p>
                    <a href="{{ route('admin.bookings.index') }}" class="text-blue-500 hover:underline">
                        View all bookings &rarr;
                    </a>
>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <!-- JavaScript to handle the search/filter functionality -->
    <script>
        // Get the search input element and table rows
        document.getElementById("searchInput").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let tableRows = document.querySelectorAll("#userTable tbody tr");

            tableRows.forEach(row => {
                let cells = row.getElementsByTagName("td");
                let name = cells[0].textContent.toLowerCase();
                let email = cells[1].textContent.toLowerCase();
                let role = cells[2].textContent.toLowerCase();

                // Check if any cell matches the filter text
                if (name.includes(filter) || email.includes(filter) || role.includes(filter)) {
                    row.style.display = ""; // Show the row if match
                } else {
                    row.style.display = "none"; // Hide the row if no match
                }
            });
        });
    </script>
=======
>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65
</x-app-layout>
