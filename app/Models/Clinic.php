<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table='clinics';

    public $timestamps=true;
    public $fillable =['name','address','longitude','latitude','timing_from','timing_to','image','city_id'];
}
