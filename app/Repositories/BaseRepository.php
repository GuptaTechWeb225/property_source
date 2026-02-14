<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Traits\CommonHelperTrait;
use App\Interfaces\TenantInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $model = $this->find($id);

        if ($model) {
            $model->update($attributes);
            return $model;
        }

        return null;
    }

    public function delete($id)
    {
        $model = $this->find($id);

        if ($model) {
            $model->delete();
            return true;
        }

        return false;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allWithPaginate()
    {
        return $this->model->paginate(10);
    }
}
