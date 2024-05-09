<?php

namespace App\Jobs;

use App\Models\ChMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteConversation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $receiver ,
        public $sender ,

    ){}

    /**
     * Execute the job.
     */
    public function handle(): void{
        ChMessage::where('from_id', $this->sender)
            ->where('to_id', $this->receiver)
            ->orWhere('from_id',$this->receiver)
            ->where('to_id',$this->sender)
            ->delete();
    }
}
