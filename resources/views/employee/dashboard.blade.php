<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">Welcome to your employee dashboard!</h3>
                    <p class="mt-2 text-sm text-gray-500">Manage your work and tasks below.</p>
                </div>

                <!-- Tabs for navigation -->
                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex space-x-4">
                        <button class="px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-md transition duration-300 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                id="invoices-tab" onclick="showTab('invoices')">
                            Invoices
                        </button>
                        <button class="px-6 py-3 text-sm font-medium text-white bg-green-600 rounded-md transition duration-300 ease-in-out hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                                id="messages-tab" onclick="showTab('messages')">
                            Messages Overview
                        </button>
                    </div>

                    <!-- Tab Content: Invoices -->
                    <div class="mt-6 hidden transition-all duration-300 ease-in-out" id="invoices-content">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Invoices Management</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">View and manage your invoices here.</p>
                        <a href="{{ route('invoices.index') }}" class="inline-flex items-center mt-4 px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Go to Invoices
                        </a>
                    </div>

                    <!-- Tab Content: Messages Overview -->
                    <div class="mt-6 hidden transition-all duration-300 ease-in-out" id="messages-content">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Messages Overview</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Manage and view your received messages here.</p>
                        <a href="{{ route('communications.index') }}" class="inline-flex items-center mt-4 px-6 py-3 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                            View Messages Overview
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts to toggle tabs -->
    <script>
        function showTab(tabName) {
            // Hide both tabs
            const invoicesContent = document.getElementById('invoices-content');
            const messagesContent = document.getElementById('messages-content'); // Correct ID here
            const invoicesTab = document.getElementById('invoices-tab');
            const messagesTab = document.getElementById('messages-tab'); // Correct ID here

            invoicesContent.classList.add('hidden');
            messagesContent.classList.add('hidden');
            invoicesTab.classList.remove('bg-blue-700');
            messagesTab.classList.remove('bg-green-700');

            // Show the selected tab content
            if (tabName === 'invoices') {
                invoicesContent.classList.remove('hidden');
                invoicesTab.classList.add('bg-blue-700');
            } else if (tabName === 'messages') {
                messagesContent.classList.remove('hidden');
                messagesTab.classList.add('bg-green-700');
            }
        }

        // Default tab (Invoices) on page load
        document.addEventListener('DOMContentLoaded', function() {
            showTab('invoices');
        });
    </script>
</x-app-layout>
