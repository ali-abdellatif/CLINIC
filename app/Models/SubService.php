<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;
    protected $table = 'sub_services';

    public $timestamps= true;
    public $fillable = ['name','service_id'];
}
