<?php

namespace App\Http\Controllers;

use App\Models\Type;

use App\Models\Marque;
use App\Models\Models;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    //
    public function IndexModel()
    {
        $types=Type::all();
        $marques = Marque::all();
        $modeles = Models::all();
         $modeles->load('marque');
        // dd($modeles);
        return view("modele", [
            "types"=>$types,
            "modeles" => $modeles,
            "marques" => $marques
        ]);
    }
    public function StoreModel(Request $request)
    {


        try{

            // return $Modeles;
            $validatedData = $request->validate([
                 'typeSelect' => 'required',
                'marqueSelect' => 'required',
                'nom_modele' => 'required|string|max:255',
            ]);
            // Sanitize the inputs to prevent XSS
            $typeSelect = htmlspecialchars($validatedData['typeSelect'], ENT_QUOTES, 'UTF-8');
            $marqueSelect = htmlspecialchars($validatedData['marqueSelect'], ENT_QUOTES, 'UTF-8');
            $nom_modele = htmlspecialchars($validatedData['nom_modele'], ENT_QUOTES, 'UTF-8');

            $nom_modele = ucfirst(strtolower(string: $nom_modele));

            // Check if the os already exists
            $existingOs = Models::where('marque_id', $marqueSelect)
            ->where('name', $nom_modele)
                ->first();

            if ($existingOs) {
                // Return an error if the establishment already exists   .
                return response()->json(['error' => 'modèle existe déjà'], 409); // 409 Conflict
            }
            $OSes = Models::create([
                "name" => $nom_modele,
                "marque_id" => $marqueSelect,
            ]);
            
            // $type =Type::where('id', $typeSelect);
            // $type=$type->name;
            // $marque =Marque::where('id', $marqueSelect);
            // $marque=$marque->name;
            $type=Type::find($typeSelect);
            $type=$type->name;
                  $marque =Marque::find($marqueSelect);
            $marque=$marque->name;
            return response()->json(['OS' => $OSes, 'type' => $type,'marque'=>$marque], 201);
              
        } catch (\Illuminate\Validation\ValidationException $e) {
                // Return the validation errors
               return response()->json(['errors' => $e->errors()], 422);
        }
     

    }

    public function UpdateModel(Request $request)
    {
        // $id = $request->id;
        // $GetModelById = Models::find($id);
        // return $GetModelById->load("marque.type.marque");


        $id = $request->id;
    $model = Models::with('marque.type')->find($id);
    $type = $model->marque->type;
    // $type= $type->load("marques");
    $marquesOfType = Marque::whereHas('type', function ($query) use ($type) {
        $query->where('id', $type->id);
    })->get();
    // Return the updated model and all marques of the same type
    return response()->json([
        'model' => $model,
        'marques_of_type' => $marquesOfType
    ]);
    }
    public function StoreUpdateModel(Request $request)
    {

        // $model = Models::find($request->IdModele);
        // $model->name = $request->old_nom_model;
        // $model->marque_id = $request->marquemodify;
        // $model->save();
        // return $model->load("marque.type");

        try {
            $validatedData = $request->validate([
                'type_id_modif' => 'required',
               'marquemodify' => 'required',
               'old_nom_model' => 'required|string|max:255',
           ]);
           $typeSelect = htmlspecialchars($validatedData['type_id_modif'], ENT_QUOTES, 'UTF-8');
           $marqueSelect = htmlspecialchars($validatedData['marquemodify'], ENT_QUOTES, 'UTF-8');
           $nom_modele = htmlspecialchars($validatedData['old_nom_model'], ENT_QUOTES, 'UTF-8');

           $nom_modele = ucfirst(strtolower(string: $nom_modele));

           $existingOs = Models::where('marque_id', $marqueSelect)
           ->where('name', $nom_modele)
            ->where('id', $request->IdModele) 
            ->first();


            if ($existingOs) {
                // Return an error if the establishment was not found
                return response()->json(['error' => "modèle non modifié."], 400);
            }

            $existingOs = Models::where('marque_id', $marqueSelect)
            ->where('name', $nom_modele)
           ->first();

            if ($existingOs) {
                // Return an error if the establishment already exists
                return response()->json(['error' => "modèle existe déjà."], 409);
            }


            // Update the establishment with new data
        $model = Models::find($request->IdModele);
        $model->name = $request->old_nom_model;
        $model->marque_id = $request->marquemodify;
        $model->save();

            return response()->json($model, 200); // 200 OK

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    public function DestroyModel(Request $request)
    {
        $id = $request->id;
        try {
            Models::destroy($id);
            return ["code"=>"200" ,"message" =>"modèle supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression,Modele already exist "];
        }
    }

}
