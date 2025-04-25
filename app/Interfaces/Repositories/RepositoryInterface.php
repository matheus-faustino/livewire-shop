<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function all(array $columns = ['*']): Collection;
    public function find(int $id, array $columns = ['*'], array $relationships = []): ?Model;
    public function create(array $attributes): Model;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): bool;
}
