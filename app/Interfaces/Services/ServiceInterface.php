<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceInterface
{
    public function all(array $columns = ['*']): Collection;
    public function find(int $id, array $columns = ['*'], array $relationships = []): ?Model;
    public function create(array $attributes): Model;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): bool;
}
