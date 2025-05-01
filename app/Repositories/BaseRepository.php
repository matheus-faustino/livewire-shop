<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function all(array $columns = ['*']): Collection
    {
        return $this->model->all();
    }

    public function find(int $id, array $columns = ['*'], array $relationships = []): ?Model
    {
        return $this->model->select($columns)->where('id', $id)->with($relationships)->first();
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function delete(int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }
}
