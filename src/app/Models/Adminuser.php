<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Adminuser extends Authenticatable
{
    use HasFactory;
    protected $table = 'adminusers';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
