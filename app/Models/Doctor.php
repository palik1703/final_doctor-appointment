<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name', 'specialty', 'description'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
