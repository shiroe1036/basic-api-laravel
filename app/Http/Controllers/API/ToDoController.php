<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\ToDoRequest;
use App\Repository\ToDoRepositoryInterface;
use Validator;

class ToDoController
{
    private $toDoRepository;

    public function __construct(ToDoRepositoryInterface $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    public function index()
    {
        $toDo = $this->toDoRepository->all();

        return response()->json($toDo, 200);
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request->all());

        if ($validator->fails()) {
            $response = [
                'success' => false,
                "message" => $validator->messages()
            ];
        } else {
            //process the request
            $this->toDoRepository->create($request->all());

            $response = [
                'success' => true,
                "message" => 'to do created successfully'
            ];
    
        }
       
        return response()->json($response);
    }

    public function update(Request $request, $idToDo)
    {
        $validator = $this->validate($request->all());

        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->messages()
            ];
        }else{
            $this->toDoRepository->update($request->all(), $idToDo);

            $response = [
                'success' => true,
                'message' => 'to Do update'
            ];
        }

        return response()->json($response);
    }

    public function delete($idToDo)
    {
        $delete = $this->toDoRepository->delete($idToDo);

        if($delete){
            $response = [
                "success" => true,
                "message" => "deleted"
            ];
        }else{
            $response = [
                "success" => false,
                "message" => "not deleted"
            ];
        }

        return response()->json($response);
    }

    private function validate($request){
        return Validator::make($request, [
            'name' => 'required'
        ]);
    }
}
