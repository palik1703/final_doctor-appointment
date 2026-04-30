<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $specialties = Doctor::select('specialty')->distinct()->pluck('specialty');

        $query = Doctor::query();
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }
        $doctors = $query->get();

        return view('welcome', compact('doctors', 'specialties'));
    }

    public function show(Doctor $doctor)
    {
        $schedules = $doctor->schedules()
            ->where('is_available', true)
            ->orderBy('date')
            ->orderBy('time')
            ->get()
            ->groupBy('date');

        return view('doctors.show', compact('doctor', 'schedules'));
    }
}
