<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::paginate(10); // Use paginate for pagination
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'mobile_number' => 'required|digits:10', // Ensures exactly 10 digits
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'status' => 'required|string|in:Pending,Completed,Cancelled',
            'address' => 'required|string|max:500',
            'report' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048', // Max 2MB file
        ]);

        // Handle File Upload
        $reportPath = null;
        if ($request->hasFile('report')) {
            $reportPath = $request->file('report')->store('reports', 'public'); // Store in storage/app/public/reports
        }

        // Create Appointment
        Appointment::create([
            'patient_name' => $request->patient_name,
            'doctor_name' => $request->doctor_name,
            'mobile_number' => $request->mobile_number ?? 'N/A', // Ensure value is stored
            'email' => $request->email ?? 'N/A',
            'address' => $request->address ?? 'N/A',
            'date' => $request->date,
            'status' => $request->status,
            'report' => $reportPath,
        ]);
        

        return redirect()->route('appointments.create')->with('success', 'Appointment added successfully!');
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.edit', compact('appointment'));
    }
    
    

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'mobile_number' => 'nullable|numeric',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:Pending,Completed,Cancelled',
        ]);
    
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
    
        return redirect('/dashboard')->with('success', 'Appointment updated successfully!');
    }
    

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // Delete report file if exists
        if ($appointment->report) {
            Storage::delete('public/' . $appointment->report);
        }

        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    /**
     * Display dashboard statistics.
     */
    public function dashboard()
    {
        $appointmentsCount = Appointment::count(); // Get total number of appointments
        $appointments = Appointment::latest()->take(5)->get(); // Fetch latest 5 appointments

        return view('dashboard', compact('appointments', 'appointmentsCount'));
    }

    /**
     * Fetch latest appointments for dashboard.
     */
    public function dashboardAppointments()
    {
        $appointments = Appointment::latest()->paginate(10);
        return view('dashboard.appointments', compact('appointments'));
    }
   

}
