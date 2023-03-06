<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::orderBy('name', 'asc')->get();
        return response()->json($publishers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:70|unique:publishers',
            'country' => 'max:250',
            'website' => 'max:75',
            'email' => 'max:75|email',
        ]);
        try {
            $publisher = new Publisher();
            $publisher->name = $request->name;
            $publisher->country = $request->country;
            $publisher->website = $request->website;
            $publisher->email = $request->email;
            $publisher->description = $request->description;
            $publisher->save();
            return response()->json(['status' => true, 'message' => 'La editorial ' . $publisher->name . ' fue creado exitosamente' ]);
        } catch (\Exception $exc){
            return response()->json(['status' => false, 'message' => 'Error al crear el registro']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publisher = Publisher::find($id);
        return response()->json($publisher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:70|unique:publishers,name,' . $id,
            'country' => 'max:250',
            'website' => 'max:75',
            'email' => 'max:75|email',
        ]);
        try {
            $publisher = Publisher::findOrFail($id);
            $publisher->name = $request->name;
            $publisher->country = $request->country;
            $publisher->website = $request->website;
            $publisher->email = $request->email;
            $publisher->description = $request->description;
            $publisher->save();
            return response()->json(['status' => true, 'message' => 'La editorial ' . $publisher->name . ' fue actualizado exitosamente' ]);
        } catch (\Exception $exc){
            return response()->json(['status' => false, 'message' => 'Error al editar el registro']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $publisher = Publisher::findOrFail($id);
            $publisher->delete();
            return response()->json(['status' => true, 'message' => 'La Editorial ' . $publisher->name . ' fue eliminado exitosamente' ]);
        } catch (\Exception $exc){
            return response()->json(['status' => false, 'message' => 'Error al eliminar el registro']);
        }
    }
}
