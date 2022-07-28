<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;
    protected $table = 'class_doctors_schedule';

    public $timestamps = true;
    public $fillable = ['day','from','to','class_doctors_id'];
}
