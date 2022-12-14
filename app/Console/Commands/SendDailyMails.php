<?php

namespace App\Console\Commands;

use App\Mail\ScheduleMail;
use App\Models\Ad;
use App\Models\Advertiser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyMails extends Command
{
    protected $signature = 'schedule:email';
    protected $description = 'Daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder';


    public function handle()
    {
        $details = "we remind you that you have ads at the next day";
        $tommorow = Carbon::tomorrow()->format('Y-m-d');
        $ads = Ad::where('start_date' ,$tommorow)->with('advertiser')->get();
        foreach ($ads as $ad) {
            Mail::to($ad->advertiser->email)->send(new ScheduleMail($details));
        }
    }
}
