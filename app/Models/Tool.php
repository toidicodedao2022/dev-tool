<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string                 $name
 * @property \MongoDB\BSON\ObjectId $attachment_oid
 * @property array|null                  $tags
 */
class Tool extends \Jenssegers\Mongodb\Eloquent\Model
{
    use HasFactory;
    protected $collection = 'tools';
    protected $fillable = ['name','tags','router_name','attachment_oid','short_content','count'];
}
