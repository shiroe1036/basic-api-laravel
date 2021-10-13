<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

interface EloquentRepositoryInterface
{
    /** 
     * Create method
     * @param array $attributes
     * @return Model
    */
    public function create(array $attributes): Model;

    public function update(array $attributes, $id);

    public function delete($id);

    /**
     * Find method
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;
}