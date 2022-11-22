<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @property string $_id
 * @property string $disk
 * @property string  $path
 */
class Attachment extends Model
{
    use HasFactory;
    protected $collection = 'attachments';
    protected $fillable = ['path','name','type','disk','bucket_name'];
}
