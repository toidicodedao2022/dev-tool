<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends \Jenssegers\Mongodb\Eloquent\Model
{
    use HasFactory;
    protected $collection = 'tools';
    protected $fillable = ['name','keywords','router_name','attachment_oid'];
}
