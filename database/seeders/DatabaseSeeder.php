<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Главный Администратор',
            'email' => 'admin@clinic.ru',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Матвеев Павел',
            'email' => 'pavel@mail.ru',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);

        Doctor::create([
            'name' => 'Иванов Иван Иванович',
            'specialty' => 'Терапевт',
            'description' => 'Врач высшей категории с опытом работы более 15 лет.'
        ]);

        Doctor::create([
            'name' => 'Смирнова Анна Сергеевна',
            'specialty' => 'Кардиолог',
            'description' => 'Специалист по сердечно-сосудистым заболеваниям.'
        ]);

        $doctors = Doctor::all();
        $startDate = Carbon::today();

        foreach ($doctors as $doctor) {
            for ($day = 1; $day <= 3; $day++) {
                $date = $startDate->copy()->addDays($day)->format('Y-m-d');

                for ($hour = 8; $hour <= 16; $hour++) {
                    Schedule::create([
                        'doctor_id' => $doctor->id,
                        'date' => $date,
                        'time' => sprintf('%02d:00:00', $hour),
                        'is_available' => true,
                    ]);
                }
            }
        }
    }
}