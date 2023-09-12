<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
