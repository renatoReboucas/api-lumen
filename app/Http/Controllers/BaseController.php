<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


abstract class BaseController
{
    protected $classe;

    public function index(){
     return $this->classe::all();
    }

    public function store(Request $request){
        return response()->json($this->classe::create($request->all()), 201);
    }

    public function show(int $id){

        $recurso = $this->classe::find($id);

        if(is_null($recurso)){
            return response('Série não encontrado', 204);
        }

        return response()->json($recurso, 200);

    }

    public function update(int $id, Request $request){

        $recurso = $this->classe::find($id);
        if (is_null($recurso)){
            return response()->json(['erro'=>'Série não encontrada'], 404);
        }
        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;

    }

    public function destroy(int $id){
        $recursosRemovidos = $this->classe::destroy($id);

        if ($recursosRemovidos == 0){
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }
        return response()->json('', 204);
    }
}