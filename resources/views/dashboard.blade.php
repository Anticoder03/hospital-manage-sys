@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white p-6">
        <h2 class="text-2xl font-bold mb-6">Hospital Dashboard</h2>
        <ul class="space-y-4">
            <li><a href="/dashboard" class="block py-2 hover:bg-blue-500 rounded">Dashboard</a></li>
            <li><a href="/patients" class="block py-2 hover:bg-blue-500 rounded">Patients</a></li>
            <li><a href="/appointments" class="block py-2 hover:bg-blue-500 rounded">Appointments</a></li>
            <li><a href="/doctors" class="block py-2 hover:bg-blue-500 rounded">Doctors</a></li>
            <li><a href="/reports" class="block py-2 hover:bg-blue-500 rounded">Reports</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Top Bar -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span>Welcome, Admin</span>
                <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 shadow rounded text-center">
                <h3 class="text-xl font-bold">Total Patients</h3>
                <p class="text-3xl text-blue-600">250</p>
            </div>
            <div class="bg-white p-6 shadow rounded text-center">
                <h3 class="text-xl font-bold">Appointments</h3>
                <p class="text-3xl text-blue-600">{{ $appointmentsCount }}</p>
            </div>
            
            <div class="bg-white p-6 shadow rounded text-center">
                <h3 class="text-xl font-bold">Doctors</h3>
                <p class="text-3xl text-blue-600">15</p>
            </div>
            <div class="bg-white p-6 shadow rounded text-center">
                <h3 class="text-xl font-bold">Earnings</h3>
                <p class="text-3xl text-green-600">$50,000</p>
            </div>
        </div>

  <!-- Recent Appointments Table -->
<div class="bg-white p-6 shadow rounded">
    <h3 class="text-xl font-bold mb-4">Recent Appointments</h3>
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
                <th class="border px-4 py-2">Actions</th>
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
                <td class="border px-4 py-2">
                    <div class="flex space-x-2">
                        <a href="{{ route('appointments.edit', $appointment->id) }}" 
                           class="bg-yellow-500 text-white px-3 py-1.5 text-sm rounded inline-flex items-center justify-center" style="    padding-top: 6px;
    padding-bottom: 6px;
    width: 64px;
    height: 32px;">
                            Update
                        </a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-3 py-1.5 text-sm rounded inline-flex items-center justify-center">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
                
                
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

    </main>
</div>
@endsection