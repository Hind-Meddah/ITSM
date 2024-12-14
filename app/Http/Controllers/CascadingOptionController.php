<?php

namespace App\Http\Controllers;

use App\Models\Accessoires;
use App\Models\Classe;
use App\Models\Type;
use App\Models\Models;

use App\Models\Devices;
use App\Models\Marque;
use Illuminate\Http\Request;

class CascadingOptionController extends Controller
{
   public function getDevice(Request $request)
   {
       $idType = $request->input('dtypeId');
       $salleId = $request->input('salleId');

       $moniteurType = Type::where('name', 'moniteur')->first();
       $sourisType = Type::where('name', 'souris')->first();
       $clavierType = Type::where('name', 'clavier')->first();

       $deviceQuery = Devices::query();

       if ($moniteurType && $idType == $moniteurType->id) {
           $deviceQuery = Accessoires::query();
       }

       if ($sourisType && $idType == $sourisType->id) {
           $deviceQuery = Accessoires::query();
       }

       if ($clavierType && $idType == $clavierType->id) {
           $deviceQuery = Accessoires::query();
       }

       $deviceQuery = $deviceQuery->where('type_id', $idType)
                   ->where('classe_id', $salleId)
                   ->get();

       return response()->json($deviceQuery);
   }
   public function Getordi(Request $request)
   {
      $salle = $request->classId;
      $ordinaturType = Type::whereName('ordinateur')->firstOrFail();
      $ordinaturTypeId = $ordinaturType->id;
      $ordinatuerParents = Devices::whereHas('type', function ($query) use ($ordinaturTypeId) {
         $query->where('id', $ordinaturTypeId);
      })->where('classe_id', $salle)->get();
      return response()->json($ordinatuerParents);
   }
   public function GetSalle(Request $request)
   {
      $id = $request->etablissementId;
      $salles = Classe::where("establishement_id", $id)->get();
      return $salles;
   }
   public function GetModel(Request $request)
   {
      $id = $request->marqueId;
      $modeles = Models::where("marque_id", $id)->get();
      return $modeles;
   }

   public function GetMarque(Request $request)
   {
      $id = $request->typeId;
      $marques = Marque::where("type_id", $id)->get();
      return $marques;
   }
}
