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
                    You are an employee! <br>
                    Create your invoices here!
                </div>
                <!-- Button for redirecting to invoices -->
                <div class="p-6 flex justify-between">
                    <a href="{{ route('invoices.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Go to Invoices
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
