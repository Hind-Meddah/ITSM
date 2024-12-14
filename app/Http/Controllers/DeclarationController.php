<?php

namespace App\Http\Controllers;

use App\Events\TicketCreated;
use App\Models\Accessoires;
use App\Models\Declaration;
use App\Models\Devices;
use App\Models\Establishement;
use App\Models\Type;
use App\Models\Marque;
use App\Models\Models;
use App\Models\Classe;
use App\Models\User;
use Carbon\Carbon;
use App\Models\OS;
use App\Models\Processors;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewTicketNotification;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    //
    public function IndexDeclaration()
    {
        $currentDateTimeFormat = now()->setTimezone('Africa/Casablanca')->format('Y-m-d h:i:s');
        $user = Auth::user();
        $etablissements = Establishement::all();
        $deviceTypes = Type::all();
        // return response()->json([
        // "currentDate" => $currentDateTimeFormat,

        // ]);
        return view("newticket", [
            "currentDateTimeFormat" => $currentDateTimeFormat,
            "user" => $user,
            "etablissements" => $etablissements,
            "deviceTypes" => $deviceTypes,
        ]);
    }

    public function StoreDeclaration(Request $request)
    {

    
        $request->validate([
            'etabliSelect'=>'required|integer',
            'typedemande' => 'required',
            'urgence' => 'required',
            'classeSelect' => 'required|integer',
            'desc_issue' => 'required|string|max:255',
            "demendeur"=> 'required',
            "typedevice"=> 'required',
            "device"=> 'required',
            "dateT"=> 'required'

        ]);

        $device_or_accesoire = Type::where("id", $request->typedevice)->first();
        $a = $device_or_accesoire->name === "moniteur" || $device_or_accesoire->name === "clavier" || $device_or_accesoire->name === "souris" ? "accessoire_id" : "device_id";
       $ticket = Declaration::create([
            "type_Anci_Dmd" => $request->typedemande,
            "urgence" => $request->urgence,
            "user_id" => Auth::user()->id,
            "classe_id" => $request->classeSelect,
            $a => $request->device,
            // "type_id" => $request->typedevice,
            "description_issue" => $request->desc_issue,
        ]);
        if ($request->typedemande == 1) {
            if ($a === 'accessoire_id') {
                $device = Accessoires::find($request->device);
                $device->status = 1;
                $device->save();

            } else {
                $device = Devices::find($request->device);
                $device->status = 1;
                $device->save();
            }
        }
        $ticket=$ticket->load("user");
        $techUsers = User::where('Role','TECH')->get();
        Notification::send($techUsers, new NewTicketNotification($ticket));
 
        if(auth()->user()->Role = "USER"){
            return redirect()->route("tickets-user");
        }
        return redirect()->route("tickets");
    }


    public function markNotificationsAsRead()
{
    auth()->user()->unreadNotifications->markAsRead();
    return back();
}

}
