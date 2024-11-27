<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintain Request Time</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-blue-800 text-black min-h-screen flex items-center justify-center">
    <div class="container max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-extrabold text-blue-700 mb-6 text-center">Select Date and Time</h1>
        <form action="{{ route('saveTime') }}" method="POST" class="space-y-6">

            @csrf

            <!-- Hidden Inputs -->
            <input type="hidden" name="maintain_id" value="{{ $maintain_id }}">
            <input type="hidden" name="vehicle_number" value="{{ $vehicle_number }}">

            <!-- Date Picker -->
            <div>
                <label for="date" class="block text-lg font-medium text-gray-700 mb-2">Select Date:</label>
                <input
                    type="date"
                    id="date"
                    name="date"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow focus:border-blue-500 focus:ring focus:ring-blue-200 transition ease-in-out duration-200"
                />
            </div>

            <!-- Time Slot Selection -->
            <div>
                <label for="timeSlot" class="block text-lg font-medium text-gray-700 mb-2">Select Time Slot:</label>
                <select
                    id="timeSlot"
                    name="time_slot"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-700 shadow focus:border-blue-500 focus:ring focus:ring-blue-200 transition ease-in-out duration-200"
                >
                <option value="" disabled selected>Select a time slot</option>
                <option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
                <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                <option value="5:00 PM - 6:00 PM">5:00 PM - 6:00 PM</option>
                <option value="6:00 PM - 7:00 PM">6:00 PM - 7:00 PM</option>
                <option value="7:00 PM - 8:00 PM">7:00 PM - 8:00 PM</option>
                    <!-- Add other time slots here -->
                </select>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button
                    type="submit"
                    class="bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg px-6 py-3 font-bold shadow-lg hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-transform transform hover:scale-105 duration-200"
                >
                    Confirm Slot
                </button>
            </div>
        </form>
    </div>
</body>
</html>
