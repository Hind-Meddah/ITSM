<?php

namespace App\Http\Controllers;
use App\Models\Declaration;
use App\Models\Devices;
use App\Models\Accessoires;

use App\Models\User;
use App\Notifications\TicketAcceptedNotification;
use App\Notifications\TicketClosedNotification;
use App\Notifications\TicketRefusedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class techtiketController extends Controller
{
    //
    public function GetTechTicket()
    {
        $ticketstatus0 = Declaration::where("status", 0)->orderBy('urgence', 'DESC')->get();
        $ticketstatus1 = Declaration::where("status", 1)->orderBy('urgence', 'DESC')->get();
        $ticketstatus2 = Declaration::where("status", 2)->orderBy('urgence', 'DESC')->get();
        $ticketstatus3 = Declaration::where("status", 3)->orderBy('urgence', 'DESC')->get();
        $ticketstatus4 = Declaration::where("status", 4)->orderBy('urgence', 'DESC')->get();

        $nbrticketstatus0 = Declaration::where("status", 0)->count();
        $nbrticketstatus1 = Declaration::where("status", 1)->count();
        $nbrticketstatus2 = Declaration::where("status", 2)->count();
        $nbrticketstatus3 = Declaration::where("status", 3)->count();
        $nbrticketstatus4 = Declaration::where("status", 4)->count();


        $ticketstatus0->load('user');
        $ticketstatus0->load('classe.establishement');
        $ticketstatus0->load('device.type');
        $ticketstatus0->load('accessoire');

        return view('tecktickets', ["ticketsstatus0" => $ticketstatus0, "nbrticketstatus0" => $nbrticketstatus0, "ticketsstatus1" => $ticketstatus1, "nbrticketstatus1" => $nbrticketstatus1, "ticketsstatus2" => $ticketstatus2, "nbrticketstatus2" => $nbrticketstatus2, "ticketsstatus3" => $ticketstatus3, "nbrticketstatus3" => $nbrticketstatus3, "ticketsstatus4" => $ticketstatus4, "nbrticketstatus4" => $nbrticketstatus4]);
        // return response()->json(["ticketsstatus0"=>$ticketstatus0,"nbrticketstatus0"=>$nbrticketstatus0]);
    }
    
    public function DetailsTechTicket(Request $request)
    {
        $id = $request->id;
        $Ticket = Declaration::find($id);
        $Ticket->load('user');
        $Ticket->load('classe.establishement');
        $Ticket->load('device.type');
        $Ticket->load('accessoire.type');
        return $Ticket;

    }
    public function AccepterTicket(Request $request)
    {
        $id_ticket = $request->id_ticketA;
        $Ticket = Declaration::find($id_ticket);
        $Ticket->status = 1;
        $Ticket->Technom =$request->nom;
        $Ticket->Techprenom =$request->prenom;
        $currentDate = Carbon::now()->toDateString();
        $Ticket->date_accept_or_refus = $currentDate;
        $Ticket->save();
        $Ticket=$Ticket->load("user");
        $user = User::find($Ticket->user_id);
        $user->notify(new TicketAcceptedNotification($Ticket));
        //  dd($user);
    }
    public function RefuserTicket(Request $request)
    {
        $id_ticket = $request->id_ticket;
        $desc = $request->Description_refus;
        $Ticket = Declaration::find($id_ticket);
        $Ticket->status = 2;
        $Ticket->Technom =$request->nom;
        $Ticket->Techprenom =$request->prenom;
        $currentDate = Carbon::now()->toDateString();
        $Ticket->date_accept_or_refus = $currentDate;
        $Ticket->description_solution =$desc;
        $Ticket->save();
        $accessoire_id=$Ticket->accessoire_id;
        $device_id=$Ticket->device_id;
        $type_Anci_Dmd=$Ticket->type_Anci_Dmd;
        if($type_Anci_Dmd === 1){
            if ($Ticket->device_id === Null) {
                $nbr1 = Declaration::where("accessoire_id", $accessoire_id)
                ->where("type_Anci_Dmd", 1)
                ->whereIn("status", [0,1, 3])
                ->count();
                if ( $nbr1===0) {
                $device = Accessoires::find($accessoire_id);
                $device->status = 0;
                $device->save(); }
            }
            else{
                $nbr2 = Declaration::where("device_id", $device_id)->where("type_Anci_Dmd", 1)->whereIn("status", [0,1, 3])->count();

                if ( $nbr2===0) {
                $device = Devices::find($device_id);
                $device->status = 0;
                $device->save(); }
            };

        };
        $Ticket=$Ticket->load("user");
        $user = User::find($Ticket->user_id);
        $user->notify(new TicketRefusedNotification($Ticket));
    }
    public function TerminerTicket(Request $request)
    {
        $id_ticket = $request->id_ticket1;
        $desc = $request->Description_ACCEPT;
        $Ticket = Declaration::find($id_ticket);
        $Ticket->status = 4;
        $currentDate = Carbon::now()->toDateString();
        $Ticket->date_Terminer = $currentDate;
        $Ticket->description_solution =$desc;

        $Ticket->save();
        $accessoire_id=$Ticket->accessoire_id;
        $device_id=$Ticket->device_id;
        $type_Anci_Dmd=$Ticket->type_Anci_Dmd;
        if($type_Anci_Dmd === 1){
            if ($Ticket->device_id === Null) {
                $nbr1 = Declaration::where("accessoire_id", $accessoire_id)
                ->where("type_Anci_Dmd", 1)
                ->whereIn("status", [0,1, 3])
                ->count();
                if ( $nbr1===0) {
                $device = Accessoires::find($accessoire_id);
                $device->status = 0;
                $device->save(); }
            }
            else{
                $nbr2 = Declaration::where("device_id", $device_id)->where("type_Anci_Dmd", 1)->whereIn("status", [0,1, 3])->count();

                if ( $nbr2===0) {
                $device = Devices::find($device_id);
                $device->status = 0;
                $device->save(); }
            };

        };
        $Ticket=$Ticket->load("user");
        $user = User::find($Ticket->user_id);
        $user->notify(new TicketClosedNotification($Ticket));
       
    }

}
