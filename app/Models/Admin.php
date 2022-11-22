<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $collection = 'admins';
    protected $fillable = ['mobile','password','full_name'];

    protected $guarded = 'admin';
}
