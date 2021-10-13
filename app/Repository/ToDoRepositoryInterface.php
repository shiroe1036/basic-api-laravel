<?php

namespace App\Repository;

use App\Model\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ToDoRepositoryInterface
{
    public function all(): Collection;
}