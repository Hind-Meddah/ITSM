<?php

namespace App\Http\Controllers;

use App\Models\Accessoires;
use App\Models\Declaration;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\User;
use App\Models\Classe;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //


    public function IndexDashboard()
    {
        // $establishmentid = Establishement::first()->id;
        $computer = Type::whereName('ordinateur')->first()->id ?? 0;
        $moniteur = Type::whereName('moniteur')->first()->id ?? 0;
        $clavier = Type::whereName('clavier')->first()->id ?? 0;
        $souris = Type::whereName('souris')->first()->id ?? 0;
        $routeur = Type::whereName('router')->first()->id ?? 0;
        $camera = Type::whereName('camera')->first()->id ?? 0;
        $printer = Type::whereName('imprimante')->first()->id ?? 0;
        $switch = Type::whereName('switch')->first()->id ?? 0;
        $pointdaccès = Type::whereName('access_point')->first()->id ?? 0;

        if (isset(Establishement::first()->id)) {
            $etablissements = Establishement::all();
            $marques = Devices::withCount('marque')->with('marque')->get();
            $chartMarque = $marques->groupBy('marque.name')
                ->map(function ($marques, $name) {
                    return [
                        'name' => $name,
                        'count' => $marques->sum('marque_count'),
                    ];
                })->all();
            $nbrEtablisment = Establishement::count() ?? 0;
            $nbrsalles = Classe::where('establishement_id', Establishement::first()->id)->count();
            $nbrusers = User::all()->count() ?? 0;
            $etablissement = Establishement::find(Establishement::first()->id);
            $classes = $etablissement->classes;
            $classId = $classes->pluck('id');
            $lastDevices = Devices::where('establishement_id', Establishement::first()->id)
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
            $lastAccessoires = Accessoires::whereIn('classe_id', $classId)
                ->orderBy('created_at', 'desc')
                ->take(2)
                ->get();
            $combinedCollection = $lastDevices->merge($lastAccessoires);
            $sortedCollection = $combinedCollection->sortByDesc('created_at');

            $nbrComputer = $computer == 0 ? 0 : Devices::where('type_id', $computer)->where('establishement_id', Establishement::first()->id)->count();
            $nbrMoniteur = $moniteur == 0 ? 0 : Accessoires::where('type_id', $moniteur)->whereIn('classe_id', $classId)->count();
            $nbrPrinter = $printer == 0 ? 0 : Devices::where('type_id', $printer)->where('establishement_id', Establishement::first()->id)->count();
            $nbrSwitch = $switch == 0 ? 0 : Devices::where('type_id', $switch)->where('establishement_id', Establishement::first()->id)->count();
            $nbrClavier = $clavier == 0 ? 0 : Accessoires::where('type_id', $clavier)->whereIn('classe_id', $classId)->count();
            $nbrSouris = $souris == 0 ? 0 : Accessoires::where('type_id', $souris)->whereIn('classe_id', $classId)->count();
            $nbrRouteur = $routeur == 0 ? 0 : Devices::where('type_id', $routeur)->where('establishement_id', Establishement::first()->id)->count();
            $nbrCamera = $camera == 0 ? 0 : Devices::where('type_id', $camera)->where('establishement_id', Establishement::first()->id)->count();
            $nbrpointdaccès = $pointdaccès == 0 ? 0 : Devices::where('type_id', $pointdaccès)->where('establishement_id', Establishement::first()->id)->count();

            $nbrDeviceEnpanne = Devices::where('status', 1)->where('establishement_id', Establishement::first()->id)->count();
            $nbrAccessoireEnpanne = Accessoires::where('status', 1)->whereIn('classe_id', $classId)->count() ;
            $nbrEnpanneTtl = $nbrDeviceEnpanne + $nbrAccessoireEnpanne;

            $nbrDeviceActive = Devices::where('status', 0)->where('establishement_id', Establishement::first()->id)->count();
            $nbrAccessoireActive = Accessoires::where('status', 0)->whereIn('classe_id', $classId)->count();
            $nbrActiveTtl = $nbrDeviceActive + $nbrAccessoireActive;

            if (auth()->user()->Role == "ADMIN" || auth()->user()->Role === "TECH") {
                $nbrDeclarationEnattent = Declaration::where('status', 0)->whereIn('classe_id', $classId)->count();
                $nbrDeclarationTerminer = Declaration::where('status', 4)->whereIn('classe_id', $classId)->count();
                $nbrDeclarationRefuse = Declaration::where('status', 2)->whereIn('classe_id', $classId)->count();

            } else if (auth()->user()->Role == "USER") {
                $nbrDeclarationEnattent = Declaration::where('status', 0)->where('user_id', auth()->user()->id)->whereIn('classe_id', $classId)->count();
                $nbrDeclarationTerminer = Declaration::where('status', 4)->where('user_id', auth()->user()->id)->whereIn('classe_id', $classId)->count();
                $nbrDeclarationRefuse = Declaration::where('status', 2)->where('user_id', auth()->user()->id)->whereIn('classe_id', $classId)->count();


            }
        }else{
            $marques = Devices::withCount('marque')->with('marque')->get();
            $chartMarque = $marques->groupBy('marque.name')
                ->map(function ($marques, $name) {
                    return [
                        'name' => $name,
                        'count' => $marques->sum('marque_count'),
                    ];
                })->all();
            $etablissements = Establishement::all();
            $nbrComputer =0;
            $nbrMoniteur =0;
            $nbrPrinter =0;
            $nbrSwitch =0;
            $nbrClavier = 0;
            $nbrSouris = 0;
            $nbrRouteur =0;
            $nbrCamera =0;
            $nbrpointdaccès =0;
            $nbrsalles =0;
            $nbrusers =0;
            $nbrEtablisment = 0;
            $nbrActiveTtl =0;
            $nbrEnpanneTtl =0;
            $nbrDeclarationEnattent =0;
           $nbrDeclarationTerminer =0;
            $nbrDeclarationRefuse =0;
            $sortedCollection =  [];
        };



        return view('dashboard', [
            "nbrComputer" => $nbrComputer,
            "nbrMoniteur" =>$nbrMoniteur,
            "nbrPrinter" => $nbrPrinter,
            "nbrSwitch" => $nbrSwitch,
            "nbrClavier" => $nbrClavier,
            "nbrSouris" => $nbrSouris,
            "nbrRouteur" => $nbrRouteur,
            "nbrCamera" => $nbrCamera,
            "nbrpointdaccès" => $nbrpointdaccès ,
            "salles" => $nbrsalles,
            "nbrusers" => $nbrusers,
            "marques" => $chartMarque,
            "nbrEtablisment" => $nbrEtablisment,
            "etablissements" => $etablissements,
            'nbrActiveTtl' => $nbrActiveTtl,
            'nbrEnpanneTtl' => $nbrEnpanneTtl,
            'nbrDeclarationEnattent' => $nbrDeclarationEnattent,
            'nbrDeclarationTerminer' => $nbrDeclarationTerminer,
            'nbrDeclarationRefuse' => $nbrDeclarationRefuse,
            "sortedCollection" => $sortedCollection

        ]);
    }
    public function IndexDashboardEtab(Request $request)
    {
        $establishmentid = $request->etablissementId;
        $computer = Type::whereName('ordinateur')->first()->id ?? 0;
        $moniteur = Type::whereName('moniteur')->first()->id ?? 0;
        $printer = Type::whereName('imprimante')->first()->id ?? 0;
        $switch = Type::whereName('switch')->first()->id ?? 0;
        $clavier = Type::whereName('clavier')->first()->id ?? 0;
        $souris = Type::whereName('souris')->first()->id ?? 0;
        $routeur = Type::whereName('router')->first()->id ?? 0;
        $camera = Type::whereName('camera')->first()->id ?? 0;
        $printer = Type::whereName('imprimante')->first()->id ?? 0;
        $marques = Devices::withCount('marque')->with('marque')->get();
        $nbrEtablisment = Establishement::count() ?? 0;
        $etablissements = Establishement::all();
        $chartMarque = $marques->groupBy('marque.name')
            ->map(function ($marques, $name) {
                return [
                    'name' => $name,
                    'count' => $marques->sum('marque_count'),
                ];
            })->all();
        $nbrpointdaccès = Type::whereName('access_point')->first()->id ?? 0;
        $etablissement = Establishement::find($establishmentid);
        $classes = $etablissement->classes;
        $classId = $classes->pluck('id');
        $nbrsalles = Classe::where('establishement_id', $establishmentid)->count() ?? 0;
        $nbrusers = User::all()->count() ?? 0;
        $nbrDeviceEnpanne = Devices::where('status', 1)->where('establishement_id', $establishmentid)->count();
        $nbrAccessoireEnpanne = Accessoires::where('status', 1)->whereIn('classe_id', $classId)->count();
        $nbrEnpanneTtl = $nbrDeviceEnpanne + $nbrAccessoireEnpanne;

        $nbrDeviceActive = Devices::where('status', 0)->where('establishement_id', $establishmentid)->count();
        $nbrAccessoireActive = Accessoires::where('status', 0)->whereIn('classe_id', $classId)->count();
        $nbrActiveTtl = $nbrDeviceActive + $nbrAccessoireActive;
        if (auth()->user()->Role == "ADMIN" || auth()->user()->Role === "TECH") {
            $nbrDeclarationEnattent = Declaration::where('status', 0)->whereIn('classe_id', $classId)->count();
            $nbrDeclarationTerminer = Declaration::where('status', 4)->whereIn('classe_id', $classId)->count();
            $nbrDeclarationRefuse = Declaration::where('status', 2)->whereIn('classe_id', $classId)->count();

        } else if (auth()->user()->Role == "USER") {
            $nbrDeclarationEnattent = Declaration::where('status', 0)->where('user_id', auth()->user()->id)->whereIn('classe_id', $classId)->count();
            $nbrDeclarationTerminer = Declaration::where('status', 4)->where('user_id', auth()->user()->id)->whereIn('classe_id', $classId)->count();
            $nbrDeclarationRefuse = Declaration::where('status', 2)->where('user_id', auth()->user()->id)->whereIn('classe_id', $classId)->count();

        }
        $lastDevices = Devices::where('establishement_id', $establishmentid)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $lastAccessoires = Accessoires::whereIn('classe_id', $classId)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();
        $combinedCollection = $lastDevices->merge($lastAccessoires);
        $sortedCollection = $combinedCollection->sortByDesc('created_at');
        $sortedCollection->load("type");
        // return response()->json($sortedCollection);
        // return $clavier == 0? 0 : Accessoires::where('type_id', $clavier)->whereIn('classe_id', $classId)->count();
        return response()->json([
            "nbrComputer" => $computer == 0 ? 0 : Devices::where('type_id', $computer)->where('establishement_id', $establishmentid)->count(),
            "nbrMoniteur" => $moniteur == 0 ? 0 : Accessoires::where('type_id', $moniteur)->whereIn('classe_id', $classId)->count(),
            "nbrPrinter" => $printer == 0 ? 0 : Devices::where('type_id', $printer)->where('establishement_id', $establishmentid)->count(),
            "nbrSwitch" => $switch == 0 ? 0 : Devices::where('type_id', $switch)->where('establishement_id', $establishmentid)->count(),
            "marques" => $chartMarque,
            "nbrEtablisment" => $nbrEtablisment,
            "etablissements" => $etablissements,
            "nbrClavier" => $clavier == 0 ? 0 : Accessoires::where('type_id', $clavier)->whereIn('classe_id', $classId)->count(),
            "nbrSouris" => $souris == 0 ? 0 : Accessoires::where('type_id', $souris)->whereIn('classe_id', $classId)->count(),
            "nbrRouteur" => $routeur == 0 ? 0 : Devices::where('type_id', $routeur)->where('establishement_id', $establishmentid)->count(),
            "nbrCamera" => $camera == 0 ? 0 : Devices::where('type_id', $camera)->where('establishement_id', $establishmentid)->count(),
            "nbrpointdaccès" => $nbrpointdaccès == 0 ? 0 : Devices::where('type_id', $nbrpointdaccès)->where('establishement_id', $establishmentid)->count(),
            "salles" => $nbrsalles,
            "nbrusers" => $nbrusers,
            'nbrActiveTtl' => $nbrActiveTtl,
            'nbrEnpanneTtl' => $nbrEnpanneTtl,
            'nbrDeclarationEnattent' => $nbrDeclarationEnattent,
            'nbrDeclarationTerminer' => $nbrDeclarationTerminer,
            'nbrDeclarationRefuse' => $nbrDeclarationRefuse,
            "sortedCollection" => $sortedCollection

        ]);




    }
}
