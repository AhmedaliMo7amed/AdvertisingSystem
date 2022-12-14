<?php

namespace App\Services;

use App\Models\ad;
use App\Models\advertiser;
use App\Traits\ResponseTrait;

class AdvertiserService
{
    use ResponseTrait;

    public function getAllAdvertisers()
    {
        return advertiser::all();
    }

    public function createNewAdvertiser($data)
    {
        $advertiser = advertiser::create($data);
        return $advertiser;
    }

    public function showAdvertiser($id)
    {
        $advertiser = advertiser::find($id);
        return $advertiser;
    }

    public function updateAdvertiser($id, $data)
    {
        $advertiser = advertiser::find($id);
        $advertiser->update($data);
        return $advertiser;
    }

    public function deleteAdvertiser($id)
    {
        $advertiser = advertiser::find($id);
        $advertiser->delete();
    }

    public function getAdvertiserAds($id)
    {
        $advertiser = advertiser::with('ads.category','ads.tags')->find($id);
        return $advertiser ;
    }


}
