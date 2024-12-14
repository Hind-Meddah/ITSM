<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function IndexTypes()
    {

        $Types = Type::all();

        return view("types", [
            "Types" => $Types,
        ]);
    }
    public function StoreTypes(Request $request)
    {

        try{
            $request->validate([
                'nom_type' => 'required|string|max:255',
            ]);

            // Check if the establishment already exists
            $existingType = Type::where('name', $request->nom_type)
                ->first();

            if ($existingType) {
                // Return an error if the establishment already exists
                return response()->json(['error' => 'Type existe déjà.'], 409); // 409 Conflict
            }

            $Types = Type::create([
                "name" => $request->nom_type,
    
            ]);
          
            return $Types;
              
        } catch (\Illuminate\Validation\ValidationException $e) {
                // Return the validation errors
               return response()->json(['errors' => $e->errors()], 422);
        }

 

    }

    // public function UpdateTypes(Request $request)
    // {
    //     $id = $request->id;
    //     $GetTypesById = Type::find($id);
    //     return $GetTypesById;
    // }
    // public function StoreUpdateTypes(Request $request)
    // {

    //     $Types = Type::find($request->id_type_modfi);
    //     $Types->name = $request->nom_type_modfi;
    //     $Types->save();

    //     return $Types;

    // }

    public function DestroyTypes(Request $request)
    {
        $id=$request->id;
        try {
            Type::destroy($id);
            return ["code"=>"200" ,"message" =>"Type supprimé avec succès"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , Type already exist "];
        }
        
    }
}
