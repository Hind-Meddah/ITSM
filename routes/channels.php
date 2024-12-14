<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('TicketChannel', function () {
//     return true;
// });

// Broadcast::channel('TicketChannel.{userRole}', function ($user, $userRole) {
//     return $user->Role === "TECH"; 
// });
Broadcast::channel('TicketChannel.{role}', function ($user, $role) {
    return $user->Role === $role;
});