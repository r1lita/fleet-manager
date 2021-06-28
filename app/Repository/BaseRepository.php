<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Collection;
use Illumiante\Database\Eloquent\Model;
use App\Repository\EloquentRepositoryInterface;



class BaseRepository implements EloquentRepositoryInterface
{
    
    protected $model;

    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
    
    
    public function all($fields = ['*'], $with = []): Collection
    {
        return $this->model->orderBy('id', 'DESC')->with($with)->get($fields);
    }
    
}