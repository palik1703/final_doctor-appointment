<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller {
    public function store(Request $request) {
        $schedule = Schedule::findOrFail($request->schedule_id);

        if (!$schedule->is_available) {
            return back()->with('error', 'Это время уже занято!');
        }

        Appointment::create([
            'user_id' => Auth::id(),
            'schedule_id' => $schedule->id,
        ]);

        $schedule->update(['is_available' => false]);

        return redirect()->route('dashboard')->with('success', 'Вы успешно записаны!');
    }
    public function destroy(Appointment $appointment) {
        if ($appointment->user_id !== Auth::id()) {
            abort(403);
        }

        $schedule = $appointment->schedule;
        $schedule->update(['is_available' => true]);

        $appointment->update(['status' => 'cancelled']);

        return back()->with('success', 'Запись успешно отменена.');
    }
}