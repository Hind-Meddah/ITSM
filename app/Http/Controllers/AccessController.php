<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
class AccessController extends Controller
{
    //
    public function IndexAccess () {
        $accessType = Type::whereName("Points d'accès")->first();
        if (!$accessType) {
            return redirect()->route('types')->with('errorAccess', 'Type de périphérique "Access-Point" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        $accessTypeId = $accessType->id;
        $etablissements=Establishement::all();
        $accessMarques = Marque::whereHas('type', function ($query) use ($accessTypeId) {
            $query->where('id', $accessTypeId);
        })->get();       
        $accesss = Devices::where('type_id', $accessTypeId)->get();
        return view("access-point",[
            "accesss"=>$accesss,
            "etablissements"=>$etablissements,
            "marques" => $accessMarques
        ]);
    }
    }


    public function StoreAccess (Request $request) {


        
       try{

        $request->validate([

            'classeSelect'=>'required|integer',
            'etabliSelect'=>'required|integer',
            'status'=>'required|boolean',
            'Libellé'=>'required|string|max:255',
            'num_serie'=>'required|string|max:255',
            'num_inventaire'=>'required|string|max:255',
            'marque_id'=>'required|integer',
            'model_select'=>'required|integer',
  
        ]);
        $accessType = Type::whereName("Points d'accès")->firstOrFail();
        $accessTypeId = $accessType->id;
        
        $Access = Devices::create([
            "n_série"=>$request->num_serie,
            "label"=>$request->Libellé,
            "n_inventaire"=>$request->num_inventaire,
            "classe_id"=>$request->classeSelect,
            "marque_id"=>$request->marque_id,
            "type_id"=>$accessTypeId,
            "model_id"=>$request->model_select,
            "status"=>$request->status,
            "establishement_id" =>$request->etabliSelect

        ]);
        
        $Access->load('marque');
        $Access->load('classe');
        $Access->load('model');
        $Access->classe->establishement;

        return $Access;
              
       } catch (\Illuminate\Validation\ValidationException $e) {
               // Return the validation errors
              return response()->json(['errors' => $e->errors()], 422);
       }
       
    }

    public function UpdateAccess(Request $request)
    {
        $id = $request->id;

        $Access = Devices::find($id);
        $Access->load('marque');
        $Access->load('classe');
        $Access->load('model');
        $Access->classe->establishement;
        $Access->classe->establishement->classes;
        $marqueId = $Access->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Computer;

        return response()->json([
            'Access' => $Access,
            'ModelsOfMarque' =>$ModelsOfMarque
        ]);
    }

    public function StoreUpdateAccess(Request $request)
    {
        $Devices = Devices::find($request->id_access_modif);
        $Devices->n_série = $request->num_serie_modif;
        $Devices->label = $request->Libellé_modif;
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

    public function DestroyAccess(Request $request){
        $id=$request->id;
        try {
            Devices::destroy($id);
            return ["code"=>"200" ,"message" =>"Access supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , Access already exist "];
        }
        
    }

    public function DetailsAccess(Request $request)
    {
        $id = $request->id;
        $Access = Devices::find($id);
        $Access->load('marque');
        $Access->load('classe');
        $Access->load('model');
        $Access->classe->establishement;
        return $Access;
    }
}
