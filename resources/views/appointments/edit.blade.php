@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white p-6">
        <h2 class="text-2xl font-bold mb-6">Hospital Dashboard</h2>
        <ul class="space-y-4">
            <li><a href="/dashboard" class="block py-2 hover:bg-blue-500 rounded">Dashboard</a></li>
            <li><a href="/patients" class="block py-2 hover:bg-blue-500 rounded">Patients</a></li>
            <li><a href="/dashboard/appointments" class="block py-2 hover:bg-blue-500 rounded">Appointments</a></li>
            <li><a href="/doctors" class="block py-2 hover:bg-blue-500 rounded">Doctors</a></li>
            <li><a href="/reports" class="block py-2 hover:bg-blue-500 rounded">Reports</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold mb-6">Edit Appointment</h1>

        <div class="bg-white p-6 shadow rounded">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Patient Name</label>
                    <input type="text" name="patient_name" value="{{ $appointment->patient_name }}" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Doctor Name</label>
                    <input type="text" name="doctor_name" value="{{ $appointment->doctor_name }}" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Mobile</label>
                    <input type="text" name="mobile_number" value="{{ $appointment->mobile_number }}" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" name="email" value="{{ $appointment->email }}" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Address</label>
                    <input type="text" name="address" value="{{ $appointment->address }}" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Date</label>
                    <input type="date" name="date" value="{{ $appointment->date }}" class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" class="w-full p-2 border rounded">
                        <option value="Pending" {{ $appointment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ $appointment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ $appointment->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Appointment</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
