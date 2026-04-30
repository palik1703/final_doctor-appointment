<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        Doctor::create($request->validate([
            'name' => 'required|string',
            'specialty' => 'required|string',
            'description' => 'nullable|string'
        ]));
        return redirect()->route('admin.doctors.index')->with('success', 'Врач добавлен.');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->validate([
            'name' => 'required|string',
            'specialty' => 'required|string',
            'description' => 'nullable|string'
        ]));
        return redirect()->route('admin.doctors.index')->with('success', 'Данные врача обновлены.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Врач удален.');
    }
}
