<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDoctor extends Model
{
    use HasFactory;
    protected $table= 'class_doctors';
    public $timestamps = true;

    public $fillable = ['title','avatar','name','email','password','birthday','phone','is_active','gender'];

}
