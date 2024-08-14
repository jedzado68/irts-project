<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'designation',
        'section',
        'division',
        'employee_status',
        'gender',
        'user_id',
        'date'
    ];
}

