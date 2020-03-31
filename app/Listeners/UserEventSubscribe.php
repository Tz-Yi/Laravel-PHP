<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\LoginCounter;

class UserEventSubscribe
{
    /**
     * Handle user login events.
     */
    public function onUserLogin() {
      $user = Auth::user();
      LoginCounter::where('name', $user->name)
                      ->update(array('loginCount' => ($user->loginCount)+1));
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function subscribe($events)
    {
      $events->listen(
          'Illuminate\Auth\Events\Login',
          'App\Listeners\UserEventSubscribe@onUserLogin'
      );
    }
}
