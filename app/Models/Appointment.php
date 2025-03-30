<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name', 
        'doctor_name', 
        'mobile_number',  // ✅ Add this
        'email',          // ✅ Add this
        'address',        // ✅ Add this
        'date', 
        'status',
        'report'          // ✅ If reports are uploaded
    ];
}
