<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;
    protected $secundo;

    public function __construct(Model $model, Model $secundo)
    {
        $this->model = $model;
        $this->secundo = $secundo;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id)
    {
       return $this->model->where('id', $id)
                          ->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /** 
     * @param $id
     * 
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
}