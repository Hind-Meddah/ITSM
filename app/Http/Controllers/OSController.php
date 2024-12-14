<?php

namespace App\Http\Controllers;

use App\Models\OS;
use Illuminate\Http\Request;

class OSController extends Controller
{
    //
    public function IndexOS()
    {
        $OSs = OS::all();
        return view("OS", ["OSs" => $OSs]);
    }
    public function StoreOS(Request $request)
    {


        try {

            // Validate the incoming request data
            $validatedData = $request->validate([
                'nameOS' => 'required|string|max:255',
            ]);
            // Sanitize the inputs to prevent XSS
            $nameOs = htmlspecialchars($validatedData['nameOS'], ENT_QUOTES, 'UTF-8');

            $nameOs = ucfirst(strtolower(string: $nameOs));

            // Check if the os already exists
            $existingOs = OS::where('name', $nameOs)
                ->first();

            if ($existingOs) {
                // Return an error if the establishment already exists   .
                return response()->json(['error' => 'Le système d\'exploitation existe déjà'], 409); // 409 Conflict
            }
            $OSes = OS::create([
                "name" => $nameOs,

            ]);

            return response()->json($OSes, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return the validation errors
            return response()->json(['errors' => $e->errors()], 422);
        }


    }

    public function UpdateOS(Request $request)
    {
        $id = $request->id;
        $GetOSById = OS::find($id);
        return $GetOSById;
    }
    public function StoreUpdateOS(Request $request)
    {

        // $OS = OS::find($request->ID_OS);
        // $OS->name = $request->Nom_OS_OLD;
        // $OS->save();
        // return $OS;


        try {
            $validatedData = $request->validate([
                'Nom_OS_OLD' => 'required|string|max:255',
            ]);
            $nameOs = htmlspecialchars($validatedData['Nom_OS_OLD'], ENT_QUOTES, 'UTF-8');

            $nameOs = ucfirst(strtolower($nameOs));

            $existingOs = OS::where('name', $nameOs)
            ->where('id', $request->ID_OS) 
            ->first();


            if ($existingOs) {
                // Return an error if the establishment was not found
                return response()->json(['error' => "Le système d'exploitation non modifié."], 400);
            }

            $existingOs = OS::where('name', $nameOs)
       
            ->first();

            if ($existingOs) {
                // Return an error if the establishment already exists
                return response()->json(['error' => "système d'exploitation existe déjà."], 409);
            }

            $Os = OS::find($request->ID_OS); // Find the establishment based on ID

            // Update the establishment with new data
            $Os->name = $nameOs;
            $Os->save();

            return response()->json($Os, 200); // 200 OK

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    public function DestroyOS(Request $request)
    {
        $id = $request->id;
        try {
            OS::destroy($id);
            return ["code" => "200", "message" => "OS supprimé avec success"];


        } catch (\Throwable $th) {
            return ["code" => "500", "message" => "error de la supression , OS already exist "];
        }
    }
}
