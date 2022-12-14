<?php

namespace App\Services;

use App\Models\ad;
use App\Models\advertiser;
use App\Traits\ResponseTrait;

class AdService
{
    use ResponseTrait;

    public function getAllAds(){
        return Ad::with('advertiser','category','tags')->get();
    }

    public function createNewAd($data){
        $advertiser = advertiser::find($data['advertiser_id']);
        $ad = $advertiser->ads()->create($data);
        $ad->tags()->attach($data['tags']);
        return $ad;
    }

    public function showAd($id)
    {
        $ad = Ad::with('advertiser','category','tags')->find($id);
        return $ad;
    }

    public function updateAd($id,$data)
    {
        $ad = Ad::find($id);
        $ad->update($data);
        $ad->tags()->sync($data['tags']);
        return $ad;
    }

    public function deleteAd($id)
    {
        $ad = Ad::find($id);
        $ad->delete();
    }
}
