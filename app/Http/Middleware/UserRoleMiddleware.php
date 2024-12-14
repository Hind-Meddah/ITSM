<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = auth()->user();

            if (auth()->check()) {
                $allowedRoutes = [
                    /* Standard User */   
                    'acc_role_USER' => [
                        "profile", "Personal-info", "change-password", "Tickets-user", "Computer",
                        "DetailsUserTicket", "DeleteTicket", "ConfirmerTicket","New-Ticket",
                        "Getdevice", "Getordi", "GetSalle", "GetModel", "GetMarque","storeTicket",
                        "DetailsUserTicket","DeleteTicket","ConfirmerTicket","Moniteur","Souris", "Clavier",
                        "Router","Switch", "Camera","Access-Point", "Imprimante","mark-notifications-as-read","DetailsComputer",
                        "DetailsRouter","DetailsSwitch","DetailsCamera","DetailsImprimante","DetailsAccess","DetailsMoniteur","DetailsClavier",
                        "DetailsSouris"

                    ],
                    /* Superviseur */ 
                    'acc_role_TECH' => [
                        "ajouter-utilisateur","utilisateur","reset-password/{id}","delete-user/{id}",
                        "New-Ticket","storeTicket","Tickets","DetailsAdminTicket","Tickets-user","DetailsUserTicket","DeleteTicket",
                        "ConfirmerTicket","Establishment","addEstablishment","deleteEstablishment","modifyEstablishment"
                        ,"modifyEstablishmentedt","Class","addClass","deleteClass","modifyClass","modifyClassedt",

                        // "profile", 'Personal-info', "change-password", "Marque","activity-devices",
                        // "Ticket-tech", "GetTechTicket", "AccepterTicket", 
                        // "RefuserTicket", "TerminerTicket", "Getdevice", "Getordi", 
                        // "GetSalle", "GetModel", "GetMarque", "Souris", "Clavier", 
                        // "Moniteur", "Access-Point", "Imprimante", "Camera", "Switch", 
                        // "Computer", "Router", "Types", "Processors", "OS", "Marque", "Modele",
                        // "mark-notifications-as-read","history-tickets"
                    ],
                    'acc_role_ADMIN' => [
                        "New-Ticket"
                    ],
                ];

                $allowedRoutesForAccType = $allowedRoutes['acc_role_' . $user->Role] ?? [];
                $currentRouteName = $request->path();
                //dd($request->path());
                switch ($user->Role) {
                    case "USER" :                       
                         if (!in_array($currentRouteName, $allowedRoutesForAccType)) {
                        abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
                        }
                        break;
                    case "TECH" :
                        if (in_array($currentRouteName, $allowedRoutesForAccType)) {
                            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
                        }
                        break;

                    case "ADMIN":
                        if (in_array($currentRouteName, $allowedRoutesForAccType)) {
                            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
                        }
                        // Admin has access to everything, so no checks required
                        break;

                    default:
                        abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
                }
            } else {
                abort(401);
            }
        } catch (\Exception $e) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }

        return $next($request);
    }
}
