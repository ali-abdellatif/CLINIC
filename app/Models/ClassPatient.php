<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ClassPatient extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $table ='class_patients';
    public $timestamps =true;

    public $fillable = ['title','avatar','name','email','password','birthday','phone',
        'is_active','gender','by','admin_id'];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
}
