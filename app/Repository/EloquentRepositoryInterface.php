<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Collection;


interface EloquentRepositoryInterface
{
    /**
     * @param array $columns
     * @param array $relations
     * @return Colleciton
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

}