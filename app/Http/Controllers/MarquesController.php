<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Type;
use Illuminate\Http\Request;

class MarquesController extends Controller
{
    //
    public function IndexMarque()
    {
        $Types = Type::all();
        $Marques = Marque::with("type")->get();
        return view("marques", [
            "Marques" => $Marques,
            "types" => $Types
        ]);
    }
    public function StoreMarque(Request $request)
    {


        try {
            $validatedData = $request->validate([
                "name" => "required|string|max:255",
                "type_id" => "required"
            ]);

            $nameMa = htmlspecialchars($validatedData['name'], ENT_QUOTES, 'UTF-8');
            $nameMa = ucfirst(strtolower(string: $nameMa));
            $existingMa = Marque::where('name', $nameMa)
                ->where('type_id', $request->type_id)
                ->first();

            if ($existingMa) {
                // Return an error if the establishment already exists   .
                return response()->json(['error' => 'type et marque existe déjà'], 409); // 409 Conflict
            }
            $Marque = Marque::create([
                "name" => $nameMa,
                "type_id" => $request->type_id,
            ]);


            return response()->json($Marque->load("type"));


        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    public function UpdateMarque(Request $request)
    {
        $id = $request->id;
        $GetMarqueById = Marque::with('type')->find($id);
        return $GetMarqueById;
    }
    public function StoreUpdateMarque(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'nommarqmodif' => 'required|string|max:255',
            ]);
            $nameMa = htmlspecialchars($validatedData['nommarqmodif'], ENT_QUOTES, 'UTF-8');

            $nameMa = ucfirst(strtolower($nameMa));

            $existingOs = Marque::where('name', $nameMa)
                ->where('type_id', $request->type_id_modif)
                ->where('id', $request->IdMarque)
                ->first();


            if ($existingOs) {
                // Return an error if the establishment was not found
                return response()->json(['error' => "marque et type non modifié."], 400);
            }

            $existingOs = Marque::where('name', $nameMa)
                ->where('type_id', $request->type_id_modif)
                ->first();

            if ($existingOs) {
                // Return an error if the establishment already exists
                return response()->json(['error' => "marque et type existe déjà."], 409);
            }

            $Marque = Marque::find($request->IdMarque); // Find the establishment based on ID
            $Marque->name = $request->nommarqmodif;
            $Marque->type_id = $request->type_id_modif;
            $Marque->save();

            return response()->json($Marque, 200); // 200 OK

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    public function DestroyMarque(Request $request)
    {
        $id = $request->id;
        $id = $request->id;
        try {
            Marque::destroy($id);
            return ["code" => "200", "message" => "Marque supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code" => "500", "message" => "error de la suppression ,Type already exist"];
        }
    }

}