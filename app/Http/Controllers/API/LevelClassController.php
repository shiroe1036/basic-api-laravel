<?php

namespace App\Http\Controllers\API;

use App\LevelClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelClass = LevelClass::paginate(request()->all());

        return Response()->json($levelClass, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);

        return LevelClass::create([
            'level' => $request['level']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        return LevelClass::where('id', $id)->update([
            'level' => $request['level']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return LevelClass::destroy($id);
    }

    private function validateInput($request){
        $this->validate($request, [
            'level' => ($request->isMethod('post') ? 'required|unique:level_class' : $request->isMethod('patch')) ? 'required' : null
        ]);
    }
}
