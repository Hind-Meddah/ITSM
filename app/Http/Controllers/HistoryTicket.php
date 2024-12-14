<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;


class HistoryTicket extends Controller
{
    
    public function notificationHistory()
    {
        $user = Auth::user();
    
        if ($user->Role == 'TECH' || $user->Role == 'ADMIN') {
            $notifications = DatabaseNotification::with('notifiable')->get();
            return view('tickethistory', compact('notifications'));
        } else {
            $notifications = $user->notifications()->with('notifiable')->get();
            return view('tickethistory', compact('notifications'));
        }
    
       
    }
}
