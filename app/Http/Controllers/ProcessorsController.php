<?php

namespace App\Http\Controllers;

use App\Models\Processors;
use Illuminate\Http\Request;

class ProcessorsController extends Controller
{
    //
    public function IndexProcessors () {
        $processors=Processors::all();
        return view("processors",["processors"=>$processors]);
    }
    public function StoreProcessors (Request $request) {

        
       try{
        $validatedData = $request->validate([
            "name"=>'required|string|max:255',
            "frequency"=>'required|integer',
            "manufacturer"=>'required|string|max:255',
            "nbcores"=>'required|integer'
      
        ]);
        $name = htmlspecialchars($validatedData['name'], ENT_QUOTES, 'UTF-8');
        $frequency = htmlspecialchars($validatedData['frequency'], ENT_QUOTES, 'UTF-8');
        $manufacturer = htmlspecialchars($validatedData['manufacturer'], ENT_QUOTES, 'UTF-8');
        $nbcores = htmlspecialchars($validatedData['nbcores'], ENT_QUOTES, 'UTF-8');

        $name = ucfirst(strtolower($name));
        $manufacturer = ucfirst(strtolower($manufacturer));
        
         // Check if the os already exists
         $existingpro = Processors::where('name', $name)
         ->where('frequency', $frequency)
         ->where('manufacturer', $manufacturer)
         ->where('nbcores', $nbcores)
         ->first();

         if ($existingpro) {
            // Return an error if the establishment already exists   .
            return response()->json(['error' => 'Processeur existe déjà'], 409); // 409 Conflict
        }
        $Processorses = Processors::create([
            "name"=>$name,
            "frequency"=>$frequency,
            "manufacturer"=>$manufacturer,
            "nbcores"=>$nbcores

            
        ]);
        return response()->json($Processorses, 201);
              
       } catch (\Illuminate\Validation\ValidationException $e) {
               // Return the validation errors
              return response()->json(['errors' => $e->errors()], 422);
       }
 

    }

    public function UpdateProcessors (Request $request) {
        $id = $request->id;
        $GetProcessorsById = Processors::find($id);
        return $GetProcessorsById;
    }
    public function StoreUpdateProcessors (Request $request) {


        // return $Processors;






        try {
            $validatedData = $request->validate([
              
                    "name_modif"=>'required|string|max:255',
                    "frequency_modif"=>'required|integer',
                    "manufacturer_modif"=>'required|string|max:255',
                    "nbcores_modif"=>'required|integer'
              
                         ]);
                         $name = htmlspecialchars($validatedData['name_modif'], ENT_QUOTES, 'UTF-8');
                         $frequency = htmlspecialchars($validatedData['frequency_modif'], ENT_QUOTES, 'UTF-8');
                         $manufacturer = htmlspecialchars($validatedData['manufacturer_modif'], ENT_QUOTES, 'UTF-8');
                         $nbcores = htmlspecialchars($validatedData['nbcores_modif'], ENT_QUOTES, 'UTF-8');
                 
                         $name = ucfirst(strtolower(string: $name));
                         $frequency = ucfirst(strtolower(string: $frequency));
                         $manufacturer = ucfirst(strtolower(string: $manufacturer));
                         $nbcores = ucfirst(strtolower(string: $nbcores));

                         $existingpro = Processors::where('name', $name)
                         ->where('frequency', $frequency)
                         ->where('manufacturer', $manufacturer)
                         ->where('nbcores', $nbcores)
                         ->where('id', $request->ID_cpu_modif)
                         ->first();             


            if ($existingpro) {
                // Return an error if the establishment was not found
                return response()->json(['error' => "processeur non modifié."], 400);
            }

            $existingpro = Processors::where('name', $name)
            ->where('frequency', $frequency)
            ->where('manufacturer', $manufacturer)
            ->where('nbcores', $nbcores)
            ->first(); 

            if ($existingpro) {
                // Return an error if the establishment already exists
                return response()->json(['error' => "processeur existe déjà."], 409);
            }

         $Processors = Processors::find($request->ID_cpu_modif);
        $Processors->name=$request->name_modif;
        $Processors->frequency=$request->frequency_modif;
        $Processors->manufacturer=$request->manufacturer_modif;
        $Processors->nbcores=$request->nbcores_modif;
        $Processors->save();

            return response()->json($Processors, 200); // 200 OK

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
       
    }

    public function  DestroyProcessors (Request $request) {
        $id=$request->id;
        try {
            Processors::destroy($id);
            return ["code"=>"200" ,"message" =>"CPU supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code"=>"500" ,"message" =>"error de la supression , CPU already exist "];
        }
    }
}
