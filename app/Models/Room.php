<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    public function diplomas()
    {
        return $this->hasMany(Diploma::class, 'room_id', 'id');
    }
    public function groups()
    {
        return $this->hasMany(Group::class, 'room_id', 'id');
    }
}
