<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    use HasFactory;
    protected $table = 'facilities';

    public $timestamps=true;
    public $fillable =['name','clinic_id'];
}
