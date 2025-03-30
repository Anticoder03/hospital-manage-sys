<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Appointments</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Patient Name</th>
                <th class="border px-4 py-2">Doctor Name</th>
                <th class="border px-4 py-2">Mobile</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Address</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $appointment->patient_name }}</td>
                <td class="border px-4 py-2">{{ $appointment->doctor_name }}</td>
                <td class="border px-4 py-2">{{ $appointment->mobile_number ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $appointment->email ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $appointment->address ?? 'N/A' }}</td>
                <td class="border px-4 py-2">{{ $appointment->date }}</td>
                <td class="border px-4 py-2">
                    <span class="px-2 py-1 rounded text-white 
                        @if($appointment->status == 'Pending') bg-yellow-500 
                        @elseif($appointment->status == 'Completed') bg-green-500 
                        @else bg-red-500 @endif">
                        {{ $appointment->status }}
                    </span>
                </td>
                <td class="border px-4 py-2">
                    @if($appointment->report)
                        <a href="{{ asset('storage/' . $appointment->report) }}" class="text-blue-500 underline" target="_blank">Download</a>
                    @else
                        <span class="text-gray-500">No Report</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $appointments->links() }} <!-- Pagination Links -->
    </div>
</div>

</body>
</html>
