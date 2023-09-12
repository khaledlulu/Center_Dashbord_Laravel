<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diploma extends Model
{
    use HasFactory, SoftDeletes;
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'diploma_id', 'id');
    }
}
