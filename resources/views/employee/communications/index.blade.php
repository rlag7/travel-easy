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

                    <div class="mb-4 flex justify-between items-center">
                        <div class="w-1/3">
                            <input type="text" id="searchInput" placeholder="Zoek op afzender..." class="w-full px-4 py-2 border rounded-md">
                        </div>
                        <a href="{{ route('communications.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            Nieuw bericht toevoegen
                        </a>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">Berichtenlijst</h3>

                    @php
                        // Tel alle communicatie-items
                        $communicationCount = 0;
                        foreach ($employees as $employee) {
                            $communicationCount += $employee->communications->count();
                        }
                    @endphp

                    @if ($communicationCount > 0)
                        <table class="w-full text-left border-collapse" id="communicationsTable">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Titel</th>
                                <th class="border px-4 py-2">Datum</th>
                                <th class="border px-4 py-2">Afzender</th>
                                <th class="border px-4 py-2">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                @foreach ($employee->communications as $communication)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $communication->message }}</td>
                                        <td class="border px-4 py-2">{{ $communication->sent_at->format('d/m/Y') }}</td>
                                        <td class="border px-4 py-2">
                                            {{ optional($communication->customer->person)->first_name }}
                                            {{ optional($communication->customer->person)->middle_name }}
                                            {{ optional($communication->customer->person)->last_name }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('communications.edit', $communication) }}" class="text-blue-500">Bewerken</a>
                                            <form action="{{ route('communications.destroy', $communication) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Verwijderen</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500">Er zijn momenteel geen berichten beschikbaar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let tableRows = document.querySelectorAll("#communicationsTable tbody tr");

            let found = false;
            tableRows.forEach(row => {
                let sender = row.getElementsByTagName("td")[2].textContent.toLowerCase(); // Derde kolom bevat afzender
                if (sender.includes(filter)) {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
                }
            });

            let noResultsMessage = document.getElementById("noResultsMessage");
            if (!found) {
                if (!noResultsMessage) {
                    noResultsMessage = document.createElement("div");
                    noResultsMessage.id = "noResultsMessage";
                    noResultsMessage.className = "bg-red-500 text-white p-4 rounded-md mt-4";
                    noResultsMessage.textContent = "Geen berichten gevonden met deze afzender.";
                    document.querySelector("#communicationsTable").insertAdjacentElement("afterend", noResultsMessage);
                }
            } else if (noResultsMessage) {
                noResultsMessage.remove();
            }
        });

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
