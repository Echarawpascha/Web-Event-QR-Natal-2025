<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Attendance extends Model
{
use HasFactory;
protected $fillable = ['participant_id','checked_in_by','checked_in_at'];


public function participant() { return $this->belongsTo(Participant::class); }
public function checker() { return $this->belongsTo(User::class, 'checked_in_by'); }
}