<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and Time Slot Selection</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-700 to-blue-900 text-gray-800 p-6 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <!-- Header -->
        <h1 class="text-2xl font-bold text-blue-700 text-center mb-6">Book Your Service Slot</h1>

        <!-- Date Picker -->
        <div class="mb-6">
            <label for="date" class="block text-lg font-semibold text-gray-700 mb-2">Select Date:</label>
            <input
                type="date"
                id="date"
                name="date"
                class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-700 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
            />
        </div>

        <!-- Time Slot Selection -->
        <div>
            <label for="timeSlot" class="block text-lg font-semibold text-gray-700 mb-2">Select Time Slot:</label>
            <select
                id="timeSlot"
                name="timeSlot"
                class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-700 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
            >
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
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-center">
            <button
                type="submit"
                class="bg-blue-600 text-white rounded-md px-6 py-2 font-semibold shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                Confirm Slot
            </button>
        </div>
    </div>
</body>
</html>
