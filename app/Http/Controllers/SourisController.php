<?php

namespace App\Http\Controllers;
use App\Models\Accessoires;
use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
use App\Models\Classe;

use App\Models\OS;
use App\Models\Processors;

class SourisController extends Controller
{
    public function IndexSouris()
    {
        // Get the Type object with name 'ordinateur'
        $sourisType = Type::whereName('souris')->first();
        if (!$sourisType) {
            return redirect()->route('types')->with('errorSouri', 'Type de périphérique "souris" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
            // $ordinaturType = Type::whereName('ordinateur')->firstOrFail();

            // Get the id property of the $ordinateurType object
            $sourisTypeId = $sourisType->id;
            // $ordinaturTypeId = $ordinaturType->id;
            // Use the $ordinateurTypeId variable in the query
            $sourisMarques = Marque::whereHas('type', function ($query) use ($sourisTypeId) {
                $query->where('id', $sourisTypeId);
            })->get();
    
            // $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
            //     $query->where('id', $ordinaturTypeId);
            // })->get();
            $souriss = Accessoires::where('type_id', $sourisTypeId)->get();
            $etablissements = Establishement::all();
            return view("mouse", [
                "souriss" => $souriss,
                "etablissements" => $etablissements,
                "marques" => $sourisMarques,
                // "ordinatuerParents" => $ordinatuerParents
                    ]);
        }
       

    }

    public function StoreSouris(Request $request)
    {

        try {    

            $request->validate([
                'etabliSelect'=>'required|integer',
                'classeSelect'=>'required|integer',
                'parentUc'=>'required|integer',
                'status'=>'required|boolean',
                'num_serie'=>'required|string|max:255',
                'num_inventaire'=>'required|string|max:255',
                'libelleInput'=>'required|string|max:255',
                'marque_id'=>'required|integer',
                'model_select'=>'required|integer',
             ]);
             $sourisType = Type::whereName('souris')->firstOrFail();
     
             // Get the id property of the $ordinateurType object
             $sourisTypeId = $sourisType->id;
             $souris = Accessoires::create([
                 "label" => $request->libelleInput,
                 "n_série" => $request->num_serie,
                 "n_inventaire" => $request->num_inventaire,
                 "classe_id" => $request->classeSelect,
                 "marque_id" => $request->marque_id,
                 "type_id" => $sourisTypeId,
                 "model_id" => $request->model_select,
                 "status" => $request->status,
                 "establishement_id" =>$request->etabliSelect,
                 "parent_ref"=>$request->parentUc
             ]);
     
             $souris->load('marque');
             $souris->load('classe');
             $souris->load('device');
             $souris->load('model');
             $souris->classe->establishement;
     
             return $souris;

        } catch (\Illuminate\Validation\ValidationException $e) {
                    // Return the validation errors
                    return response()->json(['errors' => $e->errors()], 422);
        }

    }
    public function UpdateSouris(Request $request)
    {
        $id = $request->id;

        $Souris = Accessoires::find($id);
        $salle=$Souris->classe_id;
        $ordinaturType = Type::whereName('ordinateur')->firstOrFail();
        $ordinaturTypeId = $ordinaturType->id;
        $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
            $query->where('id', $ordinaturTypeId);
        })->where('classe_id', $salle)->get();  
        $Souris->load('marque');
        $Souris->load('classe');
        $Souris->load('model');
        $Souris->classe->establishement;
        $Souris->classe->establishement->classes;
        $marqueId = $Souris->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Souris;

        return response()->json([
            'Souris' => $Souris,
            'ModelsOfMarque' =>$ModelsOfMarque,
            'ordinatuerParents'=>$ordinatuerParents
        ]);
    }

    public function StoreUpdateSouris(Request $request)
    {
        $Devices = Accessoires::find($request->id_souris_modif);
        $Devices->label = $request->libelleInput_modif;
        $Devices->n_série = $request->num_serie_modif;
        $Devices->n_inventaire = $request->num_inventaire_modif;
        $Devices->classe_id = $request->classeSelect_modif;
        $Devices->marque_id = $request->marque_id_modif;
        $Devices->model_id = $request->model_select_modif;
        $Devices->parent_ref = $request->parentUc_modier;
        $Devices->status = $request->status_modif;
        $Devices->save();
        $Devices->load('marque');
        $Devices->load('classe');
        $Devices->load('model');
        $Devices->load('device');

        $Devices->classe->establishement;
        return $Devices;

    }
    public function DestroySouris(Request $request)
    {
        $id = $request->id;
        try {
            Accessoires::destroy($id);
            return ["code"=>"200" ,"message" =>"Souris supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , Souris already exist "];
        }

    }

    public function DetailsSouris(Request $request)
    {
        $id = $request->id;
        $Souris = Accessoires::find($id);
        $Souris->load('marque');
        $Souris->load('classe');
        $Souris->load('model');
        $Souris->load('device');
        $Souris->classe->establishement;
        return $Souris;
    }
}
