<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['user_id','full_name','phone','ticket_code','checked_in_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
