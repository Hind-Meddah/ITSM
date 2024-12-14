<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Establishement;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function IndexClass()
    {
        $classe = Classe::all();
        $etablissement = Establishement::all();
        return view("classes", ["classes" => $classe, "establishements" => $etablissement]);

    }
    public function StoreClass(Request $request)
    {

        try {

            $validatedData = $request->validate([
                'nameClass' => 'required|string|max:255',
                'IdEtablissement' => 'required|integer',
            ]);

            // Sanitize the inputs to prevent XSS
            $nameClass = htmlspecialchars($validatedData['nameClass'], ENT_QUOTES, 'UTF-8');

            // Convert inputs to uppercase
            $nameClass = ucfirst($nameClass);

            // Check if the Classe already exists
            $existingClasse = Classe::where('name', $nameClass)
                ->where('establishement_id', $request->IdEtablissement)
                ->first();

            if ($existingClasse) {
                // Return an error if the Classe already exists
                return response()->json(['error' => 'Salle existe déjà.'], 409); // 409 Conflict
            }

            $class = Classe::create([
                "name" => $nameClass,
                "establishement_id" => $request->IdEtablissement,
            ]);

            $nameEtablissement = $class->establishement->name;

            return [
                "classe" => $class,
                "nameEtablissement" => $nameEtablissement,
            ];

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }


    }

    public function ModifyClass(Request $request)
    {
        $id = $request->id;
        $class = Classe::find($id);
        $class->establishement;

        return $class;
    }

    public function modify(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nameClassUp' => 'required|string|max:255',
            ]);
            $nameSalle = htmlspecialchars($validatedData['nameClassUp'], ENT_QUOTES, 'UTF-8');
            $nameSalle = ucfirst($nameSalle);

            $existingSalle = Classe::where('name', $nameSalle)
                ->where('establishement_id', $request->IdEst)
                ->where('id', $request->IdClasse) // Ensure the current record is not considered
                ->first();

            if ($existingSalle) {
                // Return an error if the establishment was not found
                return response()->json(['error' => 'Salle non modifiée.'], 400);
            }

            // Check if the new establishment name and city already exist (excluding the current record)
            $existingSalle = Classe::where('name', $nameSalle)
                ->where('establishement_id', $request->IdEst)
                ->first();

            if ($existingSalle) {
                // Return an error if the establishment already exists
                return response()->json(['error' => 'Salle existe déjà.'], 409);
            }

            $classe = Classe::find($request->IdClasse); // Find the establishment based on ID
            $classe->name = $nameSalle;
            $classe->establishement_id = $request->IdEst;
            $classe->save();
            $classe->establishement;

            return response()->json($classe, 200); // 200 OK
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
    public function DeleteClass(Request $request)
    {
        $id = $request->id;
        try {
            Classe::destroy($id);
            return ["code" => "200", "message" => "Salle supprimée avec succès"];


        } catch (\Throwable $th) {
            return ["code" => "500", "message" => "Erreur : impossible de supprimer, salle déjà utilisée."






];
        }

    }

}
