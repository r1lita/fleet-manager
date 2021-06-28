<?php

namespace App\Repository;

use App\Repository\BaseRepository;
use App\Repository\VehiculeRespositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illumiante\Database\Eloquent\Model;
use App\Models\Vehicule;

class VehiculeRepository extends BaseRepository implements VehiculeRepositoryInterface
{
    protected $model;

    public function __construct(Vehicule $model)
    {
        $this->model = $model;
    }
}