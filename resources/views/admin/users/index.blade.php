<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Search Filter (on the left) -->
                    <div class="mb-4 flex justify-between items-center">
                        <div class="w-1/3">
                            <input type="text" id="searchInput" placeholder="Search users by last name..." class="w-full px-4 py-2 border rounded-md">
                        </div>

                        <!-- Add Account Button (on the right) -->
                        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Add Account
                        </a>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">User Accounts</h3>

                    @php
                        $filteredUsers = $users->filter(fn($user) => in_array($user->role, ['user', 'employee']));
                    @endphp

                    @if ($filteredUsers->isEmpty())
                        <p class="text-gray-500 text-2xl font-bold text-center">No Accounts Found</p>
                    @else
                        <table class="w-full text-left border-collapse" id="userTable">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Full Name</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Role</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Registered</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($filteredUsers as $user)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $user->person ? $user->full_name : 'No Person Data' }}
                                    </td>
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

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let tableBody = document.querySelector("#userTable tbody");
            let tableRows = tableBody.querySelectorAll("tr");

            let matchFound = false;

            tableRows.forEach(row => {
                let nameCell = row.getElementsByTagName("td")[0]; // Get the Full Name column
                let fullName = nameCell.textContent.trim(); // Get full name text

                // Extract the last name (assuming names are in "First Middle Last" format)
                let nameParts = fullName.split(" ");
                let lastName = nameParts.length > 1 ? nameParts[nameParts.length - 1].toLowerCase() : fullName.toLowerCase();

                // Check if the last name matches the filter text
                if (lastName.includes(filter)) {
                    row.style.display = ""; // Show the row if match
                    matchFound = true;
                } else {
                    row.style.display = "none"; // Hide the row if no match
                }
            });

            // Remove any existing "no results" row
            let noResultRow = document.getElementById("noResultRow");
            if (noResultRow) {
                noResultRow.remove();
            }

            // If no match is found, show a message row
            if (!matchFound) {
                let newRow = document.createElement("tr");
                newRow.id = "noResultRow";
                newRow.innerHTML = `<td colspan="6" class="border px-4 py-2 text-center text-gray-500">No user with that last name found</td>`;
                tableBody.appendChild(newRow);
            }
        });
    </script>

</x-app-layout>
