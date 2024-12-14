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

class MoniteurController extends Controller
{
    //

    public function IndexMoniteur()
    {
        // Get the Type object with name 'ordinateur'
        $moniteurType = Type::whereName('moniteur')->first();
        if (!$moniteurType) {
            return redirect()->route('types')->with('errorMoni', 'Type de périphérique "Moniteur" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        // $ordinaturType = Type::whereName('ordinateur')->firstOrFail();

        // Get the id property of the $ordinateurType object
        $moniteurTypeId = $moniteurType->id;
        // $ordinaturTypeId = $ordinaturType->id;
        // Use the $ordinateurTypeId variable in the query
        $moniteurMarques = Marque::whereHas('type', function ($query) use ($moniteurTypeId) {
            $query->where('id', $moniteurTypeId);
        })->get();

        // $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
        //     $query->where('id', $ordinaturTypeId);
        // })->get();
        $moniteurs = Accessoires::where('type_id', $moniteurTypeId)->get();
        $etablissements = Establishement::all();
        return view("moniteur", [
            "moniteurs" => $moniteurs,
            "etablissements" => $etablissements,
            "marques" => $moniteurMarques,
            // "ordinatuerParents" => $ordinatuerParents

                ]);
            }
    }

    public function StoreMoniteur(Request $request)
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
        $moniteurType = Type::whereName('moniteur')->firstOrFail();

        // Get the id property of the $ordinateurType object
        $moniteurTypeId = $moniteurType->id;
        $moniteur = Accessoires::create([
            "label" => $request->libelleInput,
            "n_série" => $request->num_serie,
            "n_inventaire" => $request->num_inventaire,
            "classe_id" => $request->classeSelect,
            "marque_id" => $request->marque_id,
            "type_id" => $moniteurTypeId,
            "model_id" => $request->model_select,
            "status" => $request->status,
            "establishement_id" =>$request->etabliSelect,
            "parent_ref"=>$request->parentUc
        ]);

        $moniteur->load('marque');
        $moniteur->load('classe');
        $moniteur->load('device');
        $moniteur->load('model');
        $moniteur->classe->establishement;

        return $moniteur;
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return the validation errors
        return response()->json(['errors' => $e->errors()], 422);
}

    }
    public function UpdateMoniteur(Request $request)
    {
        $id = $request->id;

        $Moniteur = Accessoires::find($id);
        $salle=$Moniteur->classe_id;
        $ordinaturType = Type::whereName('ordinateur')->firstOrFail();
        $ordinaturTypeId = $ordinaturType->id;
        $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
            $query->where('id', $ordinaturTypeId);
        })->where('classe_id', $salle)->get();       
        $Moniteur->load('marque');
        $Moniteur->load('classe');
        $Moniteur->load('model');
        $Moniteur->classe->establishement;
        $Moniteur->classe->establishement->classes;
        $marqueId = $Moniteur->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Moniteur;

        return response()->json([
            'Moniteur' => $Moniteur,
            'ModelsOfMarque' =>$ModelsOfMarque,
            "ordinatuerParents"=>$ordinatuerParents
        ]);
    }

    public function StoreUpdateMoniteur(Request $request)
    {
        $Devices = Accessoires::find($request->id_moniteur_modif);
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
    public function DestroyMoniteur(Request $request)
    {
        $id = $request->id;
        try {
            Accessoires::destroy($id);
            return ["code"=>"200" ,"message" =>"Moniteur supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression ,Moniteur already used "];
        }

    }

    public function DetailsMoniteur(Request $request)
    {
        $id = $request->id;
        $Moniteur = Accessoires::find($id);
        $Moniteur->load('marque');
        $Moniteur->load('classe');
        $Moniteur->load('model');
        $Moniteur->load('device');
        $Moniteur->classe->establishement;
        return $Moniteur;
    }
}
