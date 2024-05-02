<?php

namespace App\Jobs;

use App\Events\Messaging;
use App\Models\ChMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendingMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private  $messageToSend;
    private  $reciver;

    private  $message;
    public function __construct(
        $messageToSend,
        $reciver,
        $message ,
    )
    {
        $this->messageToSend = $messageToSend;
        $this->reciver = $reciver;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if($this->message){
            \broadcast(new Messaging($this->reciver ,$this->messageToSend));
        }
    }
}
