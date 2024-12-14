<?php

namespace App\Http\Controllers;
use App\Models\Classe;
use App\Models\Establishement;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity ;

class ActivityController extends Controller
{
    public function indexActivity(){
        $logs = Activity::all();

    //    dd($logs->first()->subject);

        return view('logs',[
            'logs' => $logs
        ]);
    }

    public function indexActivityDevice(){
        $deviceslogs = Activity::all();
        $establishments = [];
    
        foreach($deviceslogs as $log){
            if($log->subject_type == 'App\Models\Devices'){
                if($log->event === "created"){
                $establishment = Establishement::find($log->properties['attributes']['establishement_id']);
                $establishments[] = $establishment;
                }else{
                    $establishment = Establishement::find($log->properties['old']['establishement_id']);
                    $establishments[] = $establishment;
                }
            

            }else{

                // $etablissement = Establishement::all();
                // $classes = $etablissement->classes;
                // $classId = $classes->pluck('id');
                if($log->event === "created"){
                    $class = Classe::find($log->properties['attributes']['classe_id']);
                    $establishment = $class->establishement;
                    $establishments[] = $establishment;
                    }else{
                        $class = Classe::find($log->properties['old']['classe_id']);
                        $establishment = $class->establishement;
                        $establishments[] = $establishment;
                    }
                // $class = Classe::find($log->subject->classe_id);
                // $establishment = $class->establishement;
                // $establishments[] = $establishment;

            };
        };
        return view('devicehistory',[
            'deviceslogs' => $deviceslogs,
            'establishments' => $establishments
        ]);
    }
}
