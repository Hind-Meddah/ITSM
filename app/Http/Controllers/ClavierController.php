<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
use App\Models\Classe;
use App\Models\Accessoires;
use App\Models\OS;
use App\Models\Processors;

class ClavierController extends Controller
{
    public function IndexClavier()
    {
        // Get the Type object with name 'ordinateur'
        $clavierType = Type::whereName('clavier')->first();
        if (!$clavierType) {
            return redirect()->route('types')->with('errorClavi', 'Type de périphérique "Caméra" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        // $ordinaturType = Type::whereName('ordinateur')->first();

        // Get the id property of the $ordinateurType object
        $clavierTypeId = $clavierType->id;
        // $ordinaturTypeId = $ordinaturType->id;
        // Use the $ordinateurTypeId variable in the query
        $clavierMarques = Marque::whereHas('type', function ($query) use ($clavierTypeId) {
            $query->where('id', $clavierTypeId);
        })->get();

        // $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
        //     $query->where('id', $ordinaturTypeId);
        // })->get();
        $claviers = Accessoires::where('type_id', $clavierTypeId)->get();
        $etablissements = Establishement::all();
        return view("Keyboard", [
            "claviers" => $claviers,
            "etablissements" => $etablissements,
            "marques" => $clavierMarques,
            // "ordinatuerParents" => $ordinatuerParents
                ]);
            }
    }

    public function StoreClavier(Request $request)
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
        $clavierType = Type::whereName('clavier')->firstOrFail();

        // Get the id property of the $ordinateurType object
        $clavierTypeId = $clavierType->id;
        $clavier = Accessoires::create([
            "label" => $request->libelleInput,
            "n_série" => $request->num_serie,
            "n_inventaire" => $request->num_inventaire,
            "classe_id" => $request->classeSelect,
            "marque_id" => $request->marque_id,
            "type_id" => $clavierTypeId,
            "model_id" => $request->model_select,
            "status" => $request->status,
            "establishement_id" =>$request->etabliSelect,
            "parent_ref"=>$request->parentUc
        ]);

        $clavier->load('marque');
        $clavier->load('classe');
        $clavier->load('device');
        $clavier->load('model');
        $clavier->classe->establishement;

        return $clavier;
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return the validation errors
        return response()->json(['errors' => $e->errors()], 422);
}
    }
    public function UpdateClavier(Request $request)
    {
        $id = $request->id;

        $Clavier = Accessoires::find($id);
        $salle=$Clavier->classe_id;
        $ordinaturType = Type::whereName('ordinateur')->firstOrFail();
        $ordinaturTypeId = $ordinaturType->id;
        $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
            $query->where('id', $ordinaturTypeId);
        })->where('classe_id', $salle)->get();       
        $Clavier->load('marque');
        $Clavier->load('classe');
        $Clavier->load('model');
        $Clavier->classe->establishement;
        $Clavier->classe->establishement->classes;
        $marqueId = $Clavier->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Clavier;

        return response()->json([
            'Clavier' => $Clavier,
            'ModelsOfMarque' =>$ModelsOfMarque,
            'ordinatuerParents'=>$ordinatuerParents
        ]);
    }

    public function StoreUpdateClavier(Request $request)
    {
        $Devices = Accessoires::find($request->id_clavier_modif);
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
    public function DestroyClavier(Request $request)
    {
        $id = $request->id;
        try {
            Accessoires::destroy($id);
            return ["code"=>"200" ,"message" =>"Clavier supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression ,Clavier already used "];
        }

    }

    public function DetailsClavier(Request $request)
    {
        $id = $request->id;
        $Clavier = Accessoires::find($id);
        $Clavier->load('marque');
        $Clavier->load('classe');
        $Clavier->load('model');
        $Clavier->load('device');
        $Clavier->classe->establishement;
        return $Clavier;
    }
}
