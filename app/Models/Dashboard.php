<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Dashboard extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'dashboards';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];
}
