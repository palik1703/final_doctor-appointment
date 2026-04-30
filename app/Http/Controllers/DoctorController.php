<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    // Показать всех врачей на главной
    public function index(\Illuminate\Http\Request $request)
    {
        // Получаем все уникальные специальности для выпадающего списка
        $specialties = Doctor::select('specialty')->distinct()->pluck('specialty');

        // Если пользователь выбрал специальность, фильтруем врачей
        $query = Doctor::query();
        if ($request->filled('specialty')) {
            $query->where('specialty', $request->specialty);
        }
        $doctors = $query->get();

        return view('welcome', compact('doctors', 'specialties'));
    }

    // Показать профиль врача и его свободное расписание
    public function show(Doctor $doctor)
    {
        // Сортируем по дате и времени, затем группируем по дате
        $schedules = $doctor->schedules()
            ->where('is_available', true)
            ->orderBy('date')
            ->orderBy('time')
            ->get()
            ->groupBy('date');

        return view('doctors.show', compact('doctor', 'schedules'));
    }
}
