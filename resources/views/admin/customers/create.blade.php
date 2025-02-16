<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuwe Klant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.customers.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="relation_number" class="block text-sm font-medium text-gray-700">Relatienummer</label>
                            <input type="text" id="relation_number" name="relation_number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('relation_number')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="remarks" class="block text-sm font-medium text-gray-700">Opmerkingen</label>
                            <textarea id="remarks" name="remarks" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                            @error('remarks')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700">Klant aanmaken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
