<?php

namespace App\Listeners;

use App\Events\newOrder;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class newOrderFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  newOrder  $event
     * @return void
     */
    public function handle(newOrder $event)
    {

        $user = User::where('id', $event->userId)->get()->toArray();
        $email = User::select('email')->where('id', $event->userId)->get()->toArray();
        Mail::send('mailOrder',$user, function($message) use ($user){

           $message->to($user['email']);
           $message->subject('Vous avez une nouvelle commande');
        });
    }
}
