<?php

namespace App\Http\Controllers;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    //
     
    public function IndexSwitch () {
        $switchType = Type::whereName('commutateur')->first();
        if (!$switchType) {
            return redirect()->route('types')->with('errorSwitch', 'Type de périphérique "Switch" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        $switchTypeId = $switchType->id;
        $etablissements=Establishement::all();
        $switchrMarques = Marque::whereHas('type', function ($query) use ($switchTypeId) {
            $query->where('id', $switchTypeId);
        })->get();       
        $switch = Devices::where('type_id', $switchTypeId)->get();
        return view("switch",[
            "Switchs"=>$switch,
            "etablissements"=>$etablissements,
            "marques" => $switchrMarques
        ]);
    }
    }


    public function StoreSwitch (Request $request) {

        try {
            $request->validate([
                "etabliSelect"=>'required',
                "classeSelect"=>'required',
                "status"=>'required',
                "libellé"=>'required',
                "num_serie"=>'required',
                "num_inventaire"=>'required',
                "marque_id"=>'required',
                "model_select"=>'required',
            ]);

            $switchType = Type::whereName('commutateur')->firstOrFail();
            $routerTypeId = $switchType->id;
            
            $Switch = Devices::create([
                "n_série"=>$request->num_serie,
                "label"=>$request->libellé,
                "n_inventaire"=>$request->num_inventaire,
                "classe_id"=>$request->classeSelect,
                "marque_id"=>$request->marque_id,
                "type_id"=>$routerTypeId,
                "model_id"=>$request->model_select,
                "status"=>$request->status,
                "establishement_id" =>$request->etabliSelect
    
            ]);
            
            $Switch->load('marque');
            $Switch->load('classe');
            $Switch->load('model');
            $Switch->classe->establishement;
    
            return $Switch;
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }

        
    }

    public function UpdateSwitch(Request $request)
    {
        $id = $request->id;

        $Switch = Devices::find($id);
        $Switch->load('marque');
        $Switch->load('classe');
        $Switch->load('model');
        $Switch->classe->establishement;
        $Switch->classe->establishement->classes;
        $marqueId = $Switch->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Computer;

        return response()->json([
            'Switch' => $Switch,
            'ModelsOfMarque' =>$ModelsOfMarque
        ]);
    }

    public function StoreUpdateSwitch(Request $request)
    {
        $Devices = Devices::find($request->id_switch_modif);
        $Devices->n_série = $request->num_serie_modif;
        $Devices->label= $request->label_modif;
        $Devices->n_inventaire = $request->num_inventaire_modif;
        $Devices->classe_id = $request->classeSelect_modif;
        $Devices->marque_id = $request->marque_id_modif;
        $Devices->model_id = $request->model_select_modif;
        $Devices->status = $request->status_modif;
        $Devices->establishement_id = $request->etabliSelect_modif;

        $Devices->save();
        $Devices->load('marque');
        $Devices->load('classe');
        $Devices->load('model');
        $Devices->classe->establishement;
        return $Devices;

    }

    public function DestroySwitch(Request $request){
        $id=$request->id;
        try {
            Devices::destroy($id);
            return ["code"=>"200" ,"message" =>"Switch supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , Switch already exist "];
        }
        
    }

    public function DetailsSwitch(Request $request)
    {
        $id = $request->id;
        $Switch = Devices::find($id);
        $Switch->load('marque');
        $Switch->load('classe');
        $Switch->load('model');
        $Switch->classe->establishement;
        return $Switch;
    }
}
