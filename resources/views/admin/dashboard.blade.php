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
                </div>
            </div>
        </div>
    </div>

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
</x-app-layout>
