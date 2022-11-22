<?php

namespace App\Services\Admins;

use App\Models\Tool;
use App\Repositories\ToolRepository;
use Illuminate\Support\Arr;
use MongoDB\BSON\ObjectId;

class ToolService
{
    public function __construct(protected ToolRepository $toolRepository)
    {
    }

    /**
     * @param array $data
     *
     * @return \App\Models\Tool
     */
    public function store(array $data): Tool
    {
        $dataCreate = [
            'name' => (string)Arr::get($data, 'name'),
            'router_name' => (string)Arr::get($data, 'router_name'),
            'attachment_oid' => new ObjectId((string)Arr::get($data, 'attachment_oid')),
            'tags' => explode(",", (string)Arr::get($data, 'tags')),
            'short_content' => Arr::get($data,'short_content')
        ];
        /** @var Tool $update */
        $update = $this->toolRepository->updateOrCreate([
            'router_name' => (string)Arr::get($data, 'router_name'),
        ], $dataCreate);

        return $update;
    }
}
