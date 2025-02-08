<?php

namespace App\Models;

use App\Models\State;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'country_code',
        'phone_code',
    ];


    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
