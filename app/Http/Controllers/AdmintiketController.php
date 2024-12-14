<?php

namespace App\Http\Controllers;

use App\Models\Declaration;
use Illuminate\Http\Request;

class AdmintiketController extends Controller
{
    //
    public function GetAdminTicket(){

        $ticketstatus0=Declaration::where("status",0)->orderBy('urgence', 'DESC')->get();
        $ticketstatus1=Declaration::where("status",1)->orderBy('urgence', 'DESC')->get();
        $ticketstatus2=Declaration::where("status",2)->orderBy('urgence', 'DESC')->get();
        $ticketstatus3=Declaration::where("status",3)->orderBy('urgence', 'DESC')->get();
        $ticketstatus4 = Declaration::where("status", 4)->orderBy('urgence', 'DESC')->get();

        $nbrticketstatus0=Declaration::where("status",0)->count();
        $nbrticketstatus1=Declaration::where("status",1)->count();
        $nbrticketstatus2=Declaration::where("status",2)->count();
        $nbrticketstatus3=Declaration::where("status",3)->count();
        $nbrticketstatus4 = Declaration::where("status", 4)->count();

        $ticketstatus0->load('user');
        $ticketstatus0->load('classe.establishement');
        $ticketstatus0->load('device.type');
        $ticketstatus0->load('accessoire');

        return view('tickets',["ticketsstatus0"=>$ticketstatus0,"nbrticketstatus0"=>$nbrticketstatus0,"ticketsstatus1"=>$ticketstatus1,"nbrticketstatus1"=>$nbrticketstatus1,"ticketsstatus2"=>$ticketstatus2,"nbrticketstatus2"=>$nbrticketstatus2,"ticketsstatus3"=>$ticketstatus3,"nbrticketstatus3"=>$nbrticketstatus3, "ticketsstatus4" => $ticketstatus4, "nbrticketstatus4" => $nbrticketstatus4]);
        // return response()->json(["ticketsstatus0"=>$ticketstatus0,"nbrticketstatus0"=>$nbrticketstatus0]);
    }
    public function DetailsAdminTicket(Request $request){
        $id = $request->id;
        $Ticket = Declaration::find($id);
        $Ticket->load('user');
        $Ticket->load('classe.establishement');
        $Ticket->load('device.type');
        $Ticket->load('accessoire.type');
        return $Ticket;

    }
}
