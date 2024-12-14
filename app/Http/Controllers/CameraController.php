<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;

class CameraController extends Controller
{
    public function IndexCamera () {
        $cameraType = Type::whereName('caméra')->first();
        if (!$cameraType) {
            return redirect()->route('types')->with('errorCamera', 'Type de périphérique "Camera" introuvable. Veuillez d’abord le créer ')->withInput();
        }else{
        $cameraTypeId = $cameraType->id;
        $etablissements=Establishement::all();
        $cameraMarques = Marque::whereHas('type', function ($query) use ($cameraTypeId) {
            $query->where('id', $cameraTypeId);
        })->get();       
        $camera = Devices::where('type_id', $cameraTypeId)->get();
        return view("camera",[
            "cameras"=>$camera,
            "etablissements"=>$etablissements,
            "marques" => $cameraMarques
        ]);
    }
    }


    public function StoreCamera(Request $request) {
    
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

            $cameraType = Type::whereName('caméra')->firstOrFail();
            $cameraTypeId = $cameraType->id;
            
            $camera = Devices::create([
                "n_série"=>$request->num_serie,
                "label"=>$request->Libellé,
                "n_inventaire"=>$request->num_inventaire,
                "marque_id"=>$request->marque_id,
                "type_id"=>$cameraTypeId,
                "model_id"=>$request->model_select,
                "status"=>$request->status,
                "establishement_id" =>$request->etabliSelect
                
            ]);
            
            $camera->load('marque');
            $camera->load('model');
            $camera->load('establishement');
    
            return $camera;
              
        } catch (\Illuminate\Validation\ValidationException $e) {
                // Return the validation errors
               return response()->json(['errors' => $e->errors()], 422);
        }



 
    }

    public function UpdateCamera(Request $request)
    {
        $id = $request->id;

        $camera = Devices::find($id);
        $camera->load('marque');
        $camera->load('establishement');
        $camera->load('model');
        $marqueId = $camera->marque_id;
        $ModelsOfMarque = Models::whereHas('marque', function ($query) use ($marqueId) {
            $query->where('id', $marqueId);
        })->get();
        // return $Computer;

        return response()->json([
            'camera' => $camera,
            'ModelsOfMarque' =>$ModelsOfMarque
        ]);
    }

    public function StoreUpdateCamera(Request $request)
    {
        $Devices = Devices::find($request->id_camera_modif);
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

    public function DestroyCamera(Request $request){
        $id=$request->id;
        $id = $request->id;
        try {
            Devices::destroy($id);
            return ["code"=>"200" ,"message" =>"Camera supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression ,Camera already used "];
        }
        
    }

    public function DetailsCamera(Request $request)
    {
        $id = $request->id;
        $Camera = Devices::find($id);
        $Camera->load('marque');
        $Camera->load('establishement');
        $Camera->load('model');
        return $Camera;
    }

}
