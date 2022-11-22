<?php

namespace App\Repositories;

use App\Models\Tool;

class ToolRepository extends BaseRepository
{
    public function __construct(Tool $model)
    {
        parent::__construct($model);
    }
}
