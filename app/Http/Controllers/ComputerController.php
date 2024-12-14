<?php

namespace App\Http\Controllers;


use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
use App\Models\Classe;

use App\Models\OS;
use App\Models\Processors;

use Illuminate\Http\Request;

class ComputerController extends Controller
{
    //

    public function IndexComputer()
    {
        // Get the Type object with name 'ordinateur'
        $ordinateurType = Type::whereName('ordinateur')->first();
        if (!$ordinateurType) {
            return redirect()->route('types')->with('errorOrdi', 'Type de périphérique "Ordinateur" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        // Get the id property of the $ordinateurType object
        $ordinateurTypeId = $ordinateurType->id;

        // Use the $ordinateurTypeId variable in the query
        $ordinateurMarques = Marque::whereHas('type', function ($query) use ($ordinateurTypeId) {
            $query->where('id', $ordinateurTypeId);
        })->get();
        $computer = Devices::where('type_id', $ordinateurTypeId)->get();
        $etablissements = Establishement::all();
        $processors = Processors::all();
        $OSs = OS::all();

        return view("computer", [
            "computers" => $computer,
            "etablissements" => $etablissements,
            "processors" => $processors,
            "marques" => $ordinateurMarques,
            "OSs" => $OSs
        ]);
    }
    }



    public function StoreComputer(Request $request)
    {

        try {
            
            $request->validate([
                "etabliSelect"=>'required|integer',
                "classeSelect"=>'required|integer',
                "libelleInput"=>'required|string|max:255',
                "num_serie"=>'required',
                "num_inventaire"=>'required',
                "marque_id"=>'required|integer',
                "model_select"=>'required|integer',
                "ram"=>'required|integer',
                "stockage"=>'required|integer',
                "status"=>'required|boolean',
                "cpu_id"=>'required|integer',
                "os_id"=>'required|integer',
            ]);
            $ordinateurType = Type::whereName('ordinateur')->firstOrFail();

            // Get the id property of the $ordinateurType object
            $ordinateurTypeId = $ordinateurType->id;
            $Computer = Devices::create([
                "label" => $request->libelleInput,
                "n_série" => $request->num_serie,
                "n_inventaire" => $request->num_inventaire,
                "ram" => $request->ram,
                "stockage" => $request->stockage,
                "os_id" => $request->os_id,
                "classe_id" => $request->classeSelect,
                "marque_id" => $request->marque_id,
                "type_id" => $ordinateurTypeId,
                "model_id" => $request->model_select,
                "cpu_id" => $request->cpu_id,
                "status" => $request->status,
                "establishement_id" =>$request->etabliSelect
            ]);
    
            $Computer->load('marque');
            $Computer->load('os');
            $Computer->load('classe');
            $Computer->load('cpu');
            $Computer->load('model');
            $Computer->classe->establishement;
    
            return $Computer;

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }

        
    }

    public function UpdateComputer(Request $request)
    {
        $id = $request->id;

        $Computer = Devices::find($id);
        $Computer->load('marque');
        $Computer->load('os');
        $Computer->load('classe');
        $Computer->load('cpu');
        $Computer->load('model');
        $Computer->classe->establishement;
        $Computer->classe->establishement->classes;
        $marqueId = $Computer->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Computer;

        return response()->json([
            'Computer' => $Computer,
            'ModelsOfMarque' =>$ModelsOfMarque
        ]);
    }

    public function StoreUpdateComputer(Request $request)
    {
        $Devices = Devices::find($request->id_computer_modif);
        $Devices->label = $request->libelleInput_modif;
        $Devices->n_série = $request->num_serie_modif;
        $Devices->n_inventaire = $request->num_inventaire_modif;
        $Devices->ram = $request->ram_modif;
        $Devices->stockage = $request->stockage_modif;
        $Devices->os_id = $request->os_id_modif;
        $Devices->classe_id = $request->classeSelect_modif;
        $Devices->marque_id = $request->marque_id_modif;
        $Devices->model_id = $request->model_select_modif;
        $Devices->cpu_id = $request->cpu_id_modif;
        $Devices->status = $request->status_modif;
        $Devices->establishement_id = $request->etabliSelect_modif;
        $Devices->save();
        $Devices->load('marque');
        $Devices->load('os');
        $Devices->load('classe');
        $Devices->load('cpu');
        $Devices->load('model');
        $Devices->classe->establishement;
        return $Devices;

    }
    public function DestroyComputer(Request $request)
    {
        $id = $request->id;
        try {
            Devices::destroy($id);
            return ["code"=>"200" ,"message" =>"Ordinateur supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression ,Ordinateur already used "];
        }
    }

    public function DetailsComputer(Request $request)
    {
        $id = $request->id;
        $Computer = Devices::find($id);
        $Computer->load('marque');
         $Computer->load('os');
         $Computer->load('classe');
         $Computer->load('cpu');
        $Computer->load('model');
         $Computer->classe->establishement;
        return $Computer;
    }
}
