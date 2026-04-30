<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Добавьте этот импорт, если его нет
use App\Models\Schedule;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'schedule_id', 'status'];

    // Связь с расписанием
    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    // ДОБАВЬТЕ ВОТ ЭТОТ БЛОК: Связь с пользователем (пациентом)
    public function user() {
        return $this->belongsTo(User::class);
    }
}
