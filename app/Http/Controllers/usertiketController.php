<?php

namespace App\Http\Controllers;

use App\Models\Declaration;
use App\Models\User;
use App\Notifications\TicketConfirmerNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Models\Accessoires;
use App\Models\Devices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class usertiketController extends Controller
{
    //
    public function GetUserTicket()
    {
        $ticketstatus0 = Declaration::where("status", 0)->where("user_id", Auth::user()->id)->orderBy('urgence', 'DESC')->get();
        $ticketstatus1 = Declaration::where("status", 1)->where("user_id", Auth::user()->id)->orderBy('urgence', 'DESC')->get();
        $ticketstatus2 = Declaration::where("status", 2)->where("user_id", Auth::user()->id)->orderBy('urgence', 'DESC')->get();
        $ticketstatus3 = Declaration::where("status", 3)->where("user_id", Auth::user()->id)->orderBy('urgence', 'DESC')->get();
        $ticketstatus4 = Declaration::where("status", 4)->where("user_id", Auth::user()->id)->orderBy('urgence', 'DESC')->get();

        $nbrticketstatus0 = Declaration::where("status", 0)->where("user_id", Auth::user()->id)->count();
        $nbrticketstatus1 = Declaration::where("status", 1)->where("user_id", Auth::user()->id)->count();
        $nbrticketstatus2 = Declaration::where("status", 2)->where("user_id", Auth::user()->id)->count();
        $nbrticketstatus3 = Declaration::where("status", 3)->where("user_id", Auth::user()->id)->count();
        $nbrticketstatus4 = Declaration::where("status", 4)->where("user_id", Auth::user()->id)->count();


        $ticketstatus0->load('user');
        $ticketstatus0->load('classe.establishement');
        $ticketstatus0->load('device.type');
        $ticketstatus0->load('accessoire');

        return view('usertickets', ["ticketsstatus0" => $ticketstatus0, "nbrticketstatus0" => $nbrticketstatus0, "ticketsstatus1" => $ticketstatus1, "nbrticketstatus1" => $nbrticketstatus1, "ticketsstatus2" => $ticketstatus2, "nbrticketstatus2" => $nbrticketstatus2, "ticketsstatus3" => $ticketstatus3, "nbrticketstatus3" => $nbrticketstatus3, "ticketsstatus4" => $ticketstatus4, "nbrticketstatus4" => $nbrticketstatus4]);
        // return response()->json(["ticketsstatus0"=>$ticketstatus0,"nbrticketstatus0"=>$nbrticketstatus0]);
    }
    public function DetailsUserTicket(Request $request)
    {
        $id = $request->id;
        $Ticket = Declaration::find($id);
        $Ticket->load('user');
        $Ticket->load('classe.establishement');
        $Ticket->load('device.type');
        $Ticket->load('accessoire.type');
        return $Ticket;

    }


    public function DeleteTicket(Request $request)
    {
        $id = $request->id;
        $Ticket = Declaration::find($id);
        $accessoire_id=$Ticket->accessoire_id;
        $device_id=$Ticket->device_id;
        $type_Anci_Dmd=$Ticket->type_Anci_Dmd;
        Declaration::destroy($id);
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
    }

    public function ConfirmerTicket(Request $request)
    {
        $id = $request->id;
        $Ticket = Declaration::find($id);
        $Ticket->status = 3;
        $currentDate = Carbon::now()->toDateString();
        $Ticket->date_confirmation = $currentDate;
        $Ticket->save();
        $currentUser = Auth::user();
        $Ticket=$Ticket->load("user");
        $techUsers = User::where('Role','TECH')->get();
        Notification::send($techUsers, new TicketConfirmerNotification($Ticket, $currentUser));
    }
}
