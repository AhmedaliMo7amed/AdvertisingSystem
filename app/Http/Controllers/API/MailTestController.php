<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ScheduleMail;
use App\Models\ad;
use App\Models\advertiser;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    use ResponseTrait;
    public function check()
    {

        // All Mails are sended to ** MAIL TRAP **
        // This is an testing controller but the process done by Command & Kernal Daily at 20:00PM

        $details = "we remind you that you have ads at the next day";
        $tommorow = Carbon::tomorrow()->format('Y-m-d');
        $ads = Ad::where('start_date' ,$tommorow)->with('advertiser')->get();
        foreach ($ads as $ad) {
            Mail::to($ad->advertiser->email)->send(new ScheduleMail($details));
        }
        return $this->returnSuccessMessage('Mail Porcess Has Been Done Successfully');
    }
}
