<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Schedule;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'schedule_id', 'status'];

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
