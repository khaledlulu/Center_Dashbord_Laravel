<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function studants()
    {
        return $this->hasMany(Studant::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
