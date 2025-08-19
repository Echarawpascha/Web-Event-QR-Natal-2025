<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Participant extends Model
{
use HasFactory;
protected $fillable = [
'user_id','event_id','full_name','email','phone','unique_code','registered_at'
];


public function user() { return $this->belongsTo(User::class); }
public function event() { return $this->belongsTo(Event::class); }
public function attendance() { return $this->hasOne(Attendance::class); }
}