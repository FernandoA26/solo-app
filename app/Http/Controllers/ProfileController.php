<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'career' => 'required|max:75',
            'website' =>  'max:75',
            'email' => 'email|max:75',
            'author.id' => 'required|integer|exists:authors,id'
        ]);
        try {
            $profile = new Profile();
            $profile->career = $request->career;
            $profile->biography = $request->biography;
            $profile->website = $request->website;
            $profile->email = $request->email;
            $profile->author_id = $request->author['id'];
            $profile->save();
            return response()->json(['status' => true, 'message' => 'El perfil del autor ' . $request->author['full_name'] . ' fue creado exitosamente' ]);
        } catch (\Exception $exc){
            return response()->json(['status' => false, 'message' => 'Error al crear el registro'. $exc]);
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'career' => 'required|max:75',
            'website' =>  'max:75',
            'email' => 'email|max:75',
            'author.id' => 'required|integer|exists:authors,id'
        ]);
        try {
            $profile = Profile::findOrFail($id);
            $profile->career = $request->career;
            $profile->biography = $request->biography;
            $profile->website = $request->website;
            $profile->email = $request->email;
            $profile->author_id = $request->author['id'];
            $profile->save();
            return response()->json(['status' => true, 'message' => 'El perfil del autor ' . $request->author['full_name'] . ' fue actualizado exitosamente' ]);
           } catch (\Exception $exc){
            return response()->json(['status' => false, 'message' => 'Error al editar el registro']);
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
    }
}
