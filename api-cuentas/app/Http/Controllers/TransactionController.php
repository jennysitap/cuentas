<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Transaction::with(['user','category','account'])->get();

        return response()->json([
            "status"=>"ok",
            "data"=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ammount' => 'required|numeric',
            'type' => 'required',
            'description' => 'required|string|min:2',
            'user_id' => 'required',
            'category_id' => 'required',
            'account_id' => 'required',
        ]);
        $data = Transaction::create($validated);
        return response()->json([
            "status"=>"ok",
            "message"=>"Recurso o dato insertado correctamente",
            "data"=>$data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaction::find($id);
        if($data){
            return response()->json([
            "status"=>"ok",
            "message"=>"cuenta encontrada",
            "data"=>$data
        ],200);
        }
        return response()->json([
            "status"=>"error",
            "message"=>"cuenta no encontrada",
        ],400);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'ammount' => 'required|numeric',
            'type' => 'required',
            'description' => 'required|string|min:2',
            'user_id' => 'required',
            'category_id' => 'required',
            'account_id' => 'required',
        ]);
        $data = Transaction::findOrFail($id);
        $data -> update($validated);
        return response()->json([
            "status"=>"ok",
            "message"=>"Dato actualizado correctamente",
            "data"=>$data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaction::find($id);
        if($data){
            $data->delete();
        }
        return response()->json([
            "status"=>"ok",
            "message"=>"Recurso o dato eliminado correctamente",
            "data"=>$data
        ]);
    }
    public function changeStatus(Request $request){
        $data = Transaction::find($request->id);
        if($data){
            $data->status=$request->status;
            $data->save();
        }
        return response()->json([
            "status"=>"ok",
            "message"=>"Recurso o dato actualizado correctamente",
            "data"=>$data
        ]);
    }
}
