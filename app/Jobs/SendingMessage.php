<?php

namespace App\Jobs;

use App\Events\Messaging;
use App\Models\ChMessage;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendingMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct(
       public $message,
       public $reciver,
       public $sender,
    ){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if($this->message){
            $receiver = User::find($this->reciver);
            if($receiver){
                \broadcast(new Messaging($receiver ,$this->message , $this->sender));
                ChMessage::create([
                    'body' => $this->message,
                    'to_id' => $receiver->id,
                    'from_id' => $this->sender->id,
                ]);
            }

        }
    }
}
