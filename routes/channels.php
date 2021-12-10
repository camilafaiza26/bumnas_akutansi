<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('App.Models.Variable.{id}', function ($variable, $id) {
    return (int) $variable->id === (int) $id;
});
Broadcast::channel('App.Models.Tetap.{id}', function ($tetap, $id) {
    return (int) $tetap->id === (int) $id;
});
Broadcast::channel('App.Models.Semi.{id}', function ($semi, $id) {
    return (int) $semi->id === (int) $id;
});
Broadcast::channel('App.Models.Perhitungan.{id}', function ($perhitungan, $id) {
    return (int) $perhitungan->id === (int) $id;
});
