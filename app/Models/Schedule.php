<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['doctor_id', 'date', 'time', 'is_available'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
