<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_name',
        'employee_salary',
        'employee_age',
        'profile_image'
    ];
}
