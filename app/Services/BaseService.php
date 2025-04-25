<?php

namespace App\Services;

use App\Interfaces\Services\ServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseService implements ServiceInterface
{
    protected $repository;

    public function all(array $columns = ['*']): Collection
    {
        return $this->repository->all();
    }

    public function find(int $id, array $columns = ['*'], array $relationships = []): ?Model
    {
        return $this->repository->find($id, $columns, $relationships);
    }

    public function create(array $attributes): Model
    {
        return $this->repository->create($attributes);
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->repository->update($id, $attributes);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
