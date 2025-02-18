<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Invoices</h3>
                        <a href="{{ route('invoices.create') }}" class="text-blue-500 inline-block">
                            Create New Invoice
                        </a>
                    </div>

                    <!-- Search Invoice Section -->
                    <div class="mb-4 flex">
                        <input type="text" id="searchInvoiceInput" placeholder="Search by Invoice Number..." class="px-4 py-2 border rounded-md w-1/3">
                    </div>

                    @if ($invoices->isEmpty())
                        <p class="text-gray-500">No Invoices Found</p>
                    @else
                        <table class="w-full text-left border-collapse" id="invoiceTable">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Invoice Number</th>
                                <th class="border px-4 py-2">Seat Number</th>
                                <th class="border px-4 py-2">Amount (€)</th>
                                <th class="border px-4 py-2">VAT (€)</th>
                                <th class="border px-4 py-2">Total (€)</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Remarks</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td class="border px-4 py-2">{{ $invoice->invoice_number }}</td>
                                    <td class="border px-4 py-2">{{ $invoice->booking->seat_number }}</td>
                                    <td class="border px-4 py-2">{{ number_format($invoice->amount_ex_vat, 2) }}</td>
                                    <td class="border px-4 py-2">{{ number_format($invoice->vat, 2) }}</td>
                                    <td class="border px-4 py-2">{{ number_format($invoice->amount_inc_vat, 2) }}</td>
                                    <td class="border px-4 py-2">{{ ucfirst($invoice->invoice_status) }}</td>
                                    <td class="border px-4 py-2 max-w-xs truncate" title="{{ $invoice->remarks }}">
                                        {{ $invoice->remarks }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="" class="text-blue-500">Download</a>
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this invoice?')">
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

                <!-- Back Button -->
                <div class="p-6">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white font-semibold rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("searchInvoiceInput").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let tableBody = document.querySelector("#invoiceTable tbody");
            let tableRows = tableBody.querySelectorAll("tr");
            let matchFound = false;

            tableRows.forEach(row => {
                let invoiceCell = row.getElementsByTagName("td")[0]; // Get the Invoice Number column
                let invoiceNumber = invoiceCell.textContent.trim().toLowerCase();

                if (invoiceNumber.includes(filter)) {
                    row.style.display = "";
                    matchFound = true;
                } else {
                    row.style.display = "none";
                }
            });

            let noResultRow = document.getElementById("noResultRow");
            if (noResultRow) {
                noResultRow.remove();
            }

            if (!matchFound) {
                let newRow = document.createElement("tr");
                newRow.id = "noResultRow";
                newRow.innerHTML = `<td colspan="8" class="border px-4 py-2 text-center text-gray-500">No invoice found with that number</td>`;
                tableBody.appendChild(newRow);
            }
        });
    </script>

</x-app-layout>
