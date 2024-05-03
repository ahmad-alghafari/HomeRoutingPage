<?php

namespace App\Jobs;

use App\Models\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Loging implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $user_id,
        public $action,
        public $description ,
        public $on_table ,
        public $url ,
        public $properties,
    ){}

    public function handle(): void
    {
        Log::create([
            'user_id' => $this->user_id,
            'action' => $this->action,
            'description' => $this->description,
            'on_table' => $this->on_table,
            'url' => $this->url,
            'properties' => $this->properties,
        ]);
    }
}
