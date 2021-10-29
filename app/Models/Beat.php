<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Beat extends Model
{
    use HasFactory;

    // id, created_at and updated_at, 

    // protected $table = 'my_flights'; --  table name      wenn nicht      'beats' (snake case + plural)
    // protected $primaryKey = 'flight_id'; primary key     wenn nicht      id

    // protected $attributes = [        default werte für attributes
    //     'delayed' => false,
    // ];

    public function getNextId()
    {

        $statement = DB::select("show table status like 'beats'");

        return $statement[0]->Auto_increment;
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCover()
    {
        return $this->hasOne(Cover::class, 'beat_id');
    }
}
