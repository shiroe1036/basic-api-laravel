<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ToDoRepositoryInterface;

class ToDoController extends Controller
{
    private $toDoRepository;

    public function __construct(ToDoRepositoryInterface $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    public function index()
    {
        $data['toDo'] = $this->toDoRepository->all();

        return view('ToDo.index', $data);
    }
}
