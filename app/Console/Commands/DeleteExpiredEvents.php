<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class DeleteExpiredEvents extends Command
{

    protected $signature = 'events:cleanup';
    protected $description = 'Delete expired events and their images';

    public function handle()
    {

        $events = Event::where('event_date','<',now())->get();

        foreach($events as $event){

            if($event->image){
                Storage::disk('public')->delete($event->image);
            }

            $event->delete();
        }

        $this->info('Expired events deleted');

    }
}