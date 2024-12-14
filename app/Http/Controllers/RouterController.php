<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;

class RouterController extends Controller
{

    public function IndexRouter () {
        $routerType = Type::whereName('routeur')->first();
        if (!$routerType) {
            return redirect()->route('types')->with('errorRouter', 'Type de périphérique "Router" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        $routerTypeId = $routerType->id;
        $etablissements=Establishement::all();
        $routerMarques = Marque::whereHas('type', function ($query) use ($routerTypeId) {
            $query->where('id', $routerTypeId);
        })->get();       
        $routers = Devices::where('type_id', $routerTypeId)->get();
        return view("router",[
            "routers"=>$routers,
            "etablissements"=>$etablissements,
            "marques" => $routerMarques
        ]);
    }
    }


    public function StoreRouter (Request $request) {

        try {
            
            $request->validate([
                "etabliSelect"=>'required|integer',
                "classeSelect"=>'required|integer',
                "status"=>'required|integer',
                "libellé"=>'required|string|max:255',
                "num_serie"=>'required|string|max:255',
                "num_inventaire"=>'required|string|max:255',
                "marque_id"=>'required|integer',
                "model_select"=>'required|integer',
            ]);
    
            $routerType = Type::whereName('routeur')->firstOrFail();
            $routerTypeId = $routerType->id;    
            $Router = Devices::create([
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
            
            $Router->load('marque');
            $Router->load('classe');
            $Router->load('model');
            $Router->classe->establishement;
    
            return $Router;

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }

       
    }

    public function UpdateRouter(Request $request)
    {
        $id = $request->id;

        $Router = Devices::find($id);
        $Router->load('marque');
        $Router->load('classe');
        $Router->load('model');
        $Router->classe->establishement;
        $Router->classe->establishement->classes;
        $marqueId = $Router->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Computer;

        return response()->json([
            'Router' => $Router,
            'ModelsOfMarque' =>$ModelsOfMarque
        ]);
    }

    public function StoreUpdateRouter(Request $request)
    {
        $Devices = Devices::find($request->id_router_modif);
        $Devices->n_série = $request->num_serie_modif;
        $Devices->label= $request->libellé_modif;
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

    public function DestroyRouter(Request $request){
        $id=$request->id;
        try {
            Devices::destroy($id);
            return ["code"=>"200" ,"message" =>"Router supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , Router already exist "];
        }
        
    }

    public function DetailsRouter(Request $request)
    {
        $id = $request->id;
        $Router = Devices::find($id);
        $Router->load('marque');
        $Router->load('classe');
        $Router->load('model');
        $Router->classe->establishement;
        return $Router;
    }

}
