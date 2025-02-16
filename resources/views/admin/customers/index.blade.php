<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
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
                        <h3 class="text-lg font-semibold">Klantenlijst</h3>
                        <a href="{{ route('admin.customers.create') }}" class="text-blue-500">Nieuwe klant toevoegen</a>
                    </div>

                    <!-- Zoekformulier -->
                    <form method="GET" action="{{ route('admin.customers.index') }}" class="mb-4 flex space-x-2">
                        <input type="text" name="search" placeholder="Zoek op achternaam" class="p-2 border border-gray-300 rounded-md" value="{{ request('search') }}">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Zoeken</button>
                    </form>

                    <!-- Geen klanten beschikbaar -->
                    @if($customers->isEmpty())
                        <div class="bg-yellow-500 text-white p-4 rounded-md">
                            Er zijn momenteel geen klanten beschikbaar.
                        </div>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Naam</th>
                                <th class="border px-4 py-2">E-mail</th>
                                <th class="border px-4 py-2">Telefoonnummer</th>
                                <th class="border px-4 py-2">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="border px-4 py-2">{{ $customer->person->name ?? 'Onbekend' }}</td>
                                    <td class="border px-4 py-2">{{ $customer->person->email ?? 'Geen e-mail' }}</td>
                                    <td class="border px-4 py-2">{{ $customer->person->phone ?? 'Geen telefoonnummer' }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.customers.edit', $customer) }}" class="text-blue-500">Bewerken</a>
                                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Weet je zeker dat je deze klant wilt verwijderen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <!-- Geen resultaten gevonden melding -->
                    @if(request('search') && $customers->isEmpty())
                        <div class="bg-red-500 text-white p-4 rounded-md mt-4">
                            Geen klant gevonden met deze achternaam.
                        </div>
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
