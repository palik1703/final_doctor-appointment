<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        // Подтягиваем связанные данные пользователя и расписания с врачом
        $appointments = Appointment::with(['user', 'schedule.doctor'])->latest()->get();
        return view('admin.appointments.index', compact('appointments'));
    }
}
