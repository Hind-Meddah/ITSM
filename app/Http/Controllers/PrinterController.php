<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
class PrinterController extends Controller
{
    //
    public function IndexImprimante () {
        $imprimanteType = Type::whereName('imprimante')->first();
        if (!$imprimanteType) {
            return redirect()->route('types')->with('errorImpri', 'Type de périphérique "Imprément" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        $imprimanteTypeId = $imprimanteType->id;
        $etablissements=Establishement::all();
        $imprimanteMarques = Marque::whereHas('type', function ($query) use ($imprimanteTypeId) {
            $query->where('id', $imprimanteTypeId);
        })->get();       
        $imprimante = Devices::where('type_id', $imprimanteTypeId)->get();
        return view("printer",[
            "imprimantes"=>$imprimante,
            "etablissements"=>$etablissements,
            "marques" => $imprimanteMarques
        ]);
    }
    }


    public function StoreImprimante(Request $request) {



        try{

            $request->validate([
          
                'etabliSelect'=>'required|integer',
                'status'=>'required|boolean',
                'Libellé'=>'required|string|max:255',
                'num_serie'=>'required|string|max:255',
                'num_inventaire'=>'required|string|max:255',
                'marque_id'=>'required|integer',
                'model_select'=>'required|integer',
            ]);
            
            $imprimanteType = Type::whereName('imprimante')->firstOrFail();
            $imprimanteTypeId = $imprimanteType->id;
            
            $imprimante = Devices::create([
                "n_série"=>$request->num_serie,
                "label"=>$request->Libellé,
                "n_inventaire"=>$request->num_inventaire,
                "marque_id"=>$request->marque_id,
                "type_id"=>$imprimanteTypeId,
                "model_id"=>$request->model_select,
                "status"=>$request->status,
                "establishement_id" =>$request->etabliSelect
                
            ]);
            
            $imprimante->load('marque');
            $imprimante->load('model');
            $imprimante->load('establishement');
    
            return $imprimante;
              
        } catch (\Illuminate\Validation\ValidationException $e) {
                // Return the validation errors
               return response()->json(['errors' => $e->errors()], 422);
        }


    }

    public function UpdateImprimante(Request $request)
    {
        $id = $request->id;

        $imprimante = Devices::find($id);
        $imprimante->load('marque');
        $imprimante->load('establishement');
        $imprimante->load('model');
        $marqueId = $imprimante->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Computer;

        return response()->json([
            'imprimante' => $imprimante,
            'ModelsOfMarque' =>$ModelsOfMarque
        ]);
    }

    public function StoreUpdateImprimante(Request $request)
    {
        $Devices = Devices::find($request->id_imprimante_modif);
        $Devices->n_série = $request->num_serie_modif;
        $Devices->label = $request->Libellé_modif;
        $Devices->n_inventaire = $request->num_inventaire_modif;
        $Devices->marque_id = $request->marque_id_modif;
        $Devices->model_id = $request->model_select_modif;
        $Devices->status = $request->status_modif;
        $Devices->establishement_id = $request->etabliSelect_modif;
        $Devices->save();
        $Devices->load('marque');
        $Devices->load('model');
        $Devices->load('establishement');

        return $Devices;

    }

    public function DestroyImprimante(Request $request){
        $id=$request->id;
        try {
            Devices::destroy($id);
            return ["code"=>"200" ,"message" =>"Type supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , Type already exist "];
        }
    }

    public function DetailsImprimante(Request $request)
    {
        $id = $request->id;
        $Imprimante = Devices::find($id);
        $Imprimante->load('marque');
        $Imprimante->load('establishement');
        $Imprimante->load('model');
        return $Imprimante;
    }
}
