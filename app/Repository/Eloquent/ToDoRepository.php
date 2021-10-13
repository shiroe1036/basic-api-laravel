<?php

namespace App\Repository\Eloquent;

use App\ToDo;
use App\Repository\ToDoRepositoryInterface;
use App\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ToDoRepository extends BaseRepository implements ToDoRepositoryInterface
{

    /**
     * toDoRepository constructor
     * 
     * @param ToDo $model
     */
    public function __construct(ToDo $model, Student $modelStudtent)
    {
        // $this->modelStudent = $modelStudtent;
        parent::__construct($model, $modelStudtent);
    }

    /**
     * get all data methode
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    // public function create(array $attributes): Model
    // {
    //     // echo "create dans toDoRepository";
    //     return $this->model->create($attributes);
    // }
}