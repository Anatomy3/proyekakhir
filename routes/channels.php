<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
*/

// Channel untuk user yang login
Broadcast::channel('chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Channel untuk admin
Broadcast::channel('admin.chat', function ($user) {
    return $user->isAdmin || $user->role === 'admin';
});

// Channel untuk guest user
Broadcast::channel('chat.guest.{sessionId}', function ($user, $sessionId) {
    // Guest channels tidak memerlukan otentikasi
    return true;
});