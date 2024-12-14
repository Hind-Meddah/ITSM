<?php

namespace App\Http\Controllers;

use App\Models\Establishement;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Pest\Laravel\json;

class EtablissementController extends Controller
{
    //

    public function IndexEstablishement()
    {
        $etablissement = Establishement::all();
        return view("establishement", ["establishements" => $etablissement]);

    }
    public function StoreEstablishement(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'nameEstablishement' => 'required|string|max:255',
                'villeEstablishement' => 'required|string|max:255',
            ]);

            // Sanitize the inputs to prevent XSS
            $nameEstablishement = htmlspecialchars($validatedData['nameEstablishement'], ENT_QUOTES, 'UTF-8');
            $villeEstablishement = htmlspecialchars($validatedData['villeEstablishement'], ENT_QUOTES, 'UTF-8');

            // Convert inputs to uppercase
            $nameEstablishement = strtoupper($nameEstablishement);
            $villeEstablishement = strtoupper($villeEstablishement);

            // Check if the establishment already exists
            $existingEstablishment = Establishement::where('name', $nameEstablishement)
                ->where('ville', $villeEstablishement)
                ->first();

            if ($existingEstablishment) {
                // Return an error if the establishment already exists
                return response()->json(['error' => 'L\'établissement existe déjà.'], 409); // 409 Conflict
            }
            // Create the establishment using the validated data
            $Establishement = Establishement::create([
                'name' => $nameEstablishement,
                'ville' => $villeEstablishement,
            ]);

            // Return the newly created establishment
            return response()->json($Establishement, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }
    }


    public function ModifyEstablishment(Request $request)
    {
        $id = $request->id;
        $establishment = Establishement::find($id);
        // $establishment->name=$request->nameEstablishement;
        // $establishment->ville=$request->villeEstablishement;
        // $establishment->save();
        return $establishment;
    }
    public function DeleteEstablishement(Request $request)
    {
        $id = $request->id;
        try {
            Establishement::destroy($id);
            return ["code" => "200", "message" => "Établissement supprimé avec succès"];


        } catch (\Throwable $th) {
            return ["code" => "500", "message" => "Erreur : impossible de supprimer, le type est déjà utilisé"];
        }

    }
    public function modify(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nameEstablishementUp' => 'required|string|max:255',
                'villeEstablishementUp' => 'required|string|max:255',
            ]);
            $nameEstablishement = htmlspecialchars($validatedData['nameEstablishementUp'], ENT_QUOTES, 'UTF-8');
            $villeEstablishement = htmlspecialchars($validatedData['villeEstablishementUp'], ENT_QUOTES, 'UTF-8');

            // Convert inputs to uppercase
            $nameEstablishement = strtoupper($nameEstablishement);
            $villeEstablishement = strtoupper($villeEstablishement);

            $existingEstablishmentid = Establishement::where('name', $nameEstablishement)
                ->where('ville', $villeEstablishement)
                ->where('id', $request->IdEstablishement) // Ensure the current record is not considered
                ->first();

            if ($existingEstablishmentid) {
                // Return an error if the establishment was not found
                return response()->json(['error' => 'Établissement non modifié.'], 400);
            }

            // Check if the new establishment name and city already exist (excluding the current record)
            $existingEstablishment = Establishement::where('name', $nameEstablishement)
                ->where('ville', $villeEstablishement)->first();

            if ($existingEstablishment) {
                // Return an error if the establishment already exists
                return response()->json(['error' => 'L\'établissement existe déjà.'], 409);
            }

            $establishment = Establishement::find($request->IdEstablishement); // Find the establishment based on ID

            // Update the establishment with new data
            $establishment->name = $nameEstablishement;
            $establishment->ville = $villeEstablishement;
            $establishment->save();

            return response()->json($establishment, 200); // 200 OK

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

}