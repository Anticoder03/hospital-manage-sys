@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard Appointments</h1>
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Patient Name</th>
                <th class="border px-4 py-2">Doctor Name</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td class="border px-4 py-2">{{ $appointment->patient_name }} </td>
                    <td class="border px-4 py-2">{{ $appointment->doctor_name }}</td>
                    <td class="border px-4 py-2">{{ $appointment->date }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($appointment->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $appointments->links() }}
</div>
@endsection
