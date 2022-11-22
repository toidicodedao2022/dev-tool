<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    public function __construct(public \Jenssegers\Mongodb\Eloquent\Model $model)
    {

    }

    /**
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data):Model
    {
        return $this->model::query()->create($data);
    }

    /**
     * @param array $cond
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreate(array $cond,array $data):Model
    {
        return $this->model::query()->updateOrCreate($cond,$data);
    }

    /**
     * @param array $cond
     * @param int   $limit
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find(array $cond,int $limit=100):Collection
    {
        return $this->model::query()->where($cond)->limit($limit)->get();
    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findById(string $id):Model|null
    {
        return $this->model::query()->find($id);
    }
}
