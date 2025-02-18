<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer ID</label>
                            <input type="number" id="customer_id" name="customer_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('customer_id')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="trip_id" class="block text-sm font-medium text-gray-700">Trip ID</label>
                            <input type="number" id="trip_id" name="trip_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('trip_id')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="seat_number" class="block text-sm font-medium text-gray-700">Seat Number</label>
                            <input type="text" id="seat_number" name="seat_number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                            @error('seat_number')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="purchase_date" class="block text-sm font-medium text-gray-700">Purchase Date</label>
                            <input type="date" id="purchase_date" name="purchase_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('purchase_date')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="purchase_time" class="block text-sm font-medium text-gray-700">Purchase Time</label>
                            <input type="time" id="purchase_time" name="purchase_time" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('purchase_time')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="booking_status" class="block text-sm font-medium text-gray-700">Booking Status</label>
                            <select id="booking_status" name="booking_status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            @error('booking_status')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price (€)</label>
                            <input type="number" id="price" name="price" step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('price')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            @error('quantity')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="special_requests" class="block text-sm font-medium text-gray-700">Special Requests</label>
                            <textarea id="special_requests" name="special_requests" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('special_requests') }}</textarea>
                            @error('special_requests')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="block text-sm font-medium text-gray-700">Is Active?</label>
                            <select id="is_active" name="is_active" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('is_active')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700">
                                Create Booking
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
