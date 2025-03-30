<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
    <h2 class="text-2xl font-bold mb-4 text-center">Add New Appointment</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold">Patient Name</label>
            <input type="text" name="patient_name" class="w-full p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Doctor Name</label>
            <input type="text" name="doctor_name" class="w-full p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Mobile Number</label>
            <input type="text" name="mobile_number" class="w-full p-2 border rounded-lg" required pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Appointment Date</label>
            <input type="date" name="date" class="w-full p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Status</label>
            <select name="status" class="w-full p-2 border rounded-lg">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Address</label>
            <textarea name="address" class="w-full p-2 border rounded-lg" rows="3" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Upload Report</label>
            <input type="file" name="report" class="w-full p-2 border rounded-lg" accept=".pdf,.jpg,.png,.jpeg">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="w-1/2 bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">
                Save Appointment
            </button>

          
        </div>
    </form>
</div>

</body>
</html>
