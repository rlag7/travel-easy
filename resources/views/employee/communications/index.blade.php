<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Communications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div id="success-message" class="bg-green-500 text-white p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Berichten</h3>
                        <a href="{{ route('communications.create') }}" class="text-blue-500 inline-block">Create New Message</a>
                    </div>

                    @if($communications->isEmpty())
                        <div class="bg-yellow-500 text-white p-4 rounded-md">
                            Er zijn momenteel geen berichten beschikbaar.
                        </div>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Titel</th>
                                <th class="border px-4 py-2">Datum</th>
                                <th class="border px-4 py-2">Afzender</th>
                                <th class="border px-4 py-2">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($communications as $communication)
                                <tr>
                                    <td class="border px-4 py-2">{{ $communication->title }}</td>
                                    <td class="border px-4 py-2">{{ $communication->sent_at->format('d/m/Y') }}</td>
                                    <td class="border px-4 py-2">{{ $communication->employee ? $communication->employee->name : 'Onbekend' }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('communications.edit', $communication) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('communications.destroy', $communication) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
        window.onload = function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        };
    </script>
</x-app-layout>
