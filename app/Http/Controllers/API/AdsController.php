<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdsRequest;
use App\Models\ad;
use App\Services\AdService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    use ResponseTrait;
    protected $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function index()
    {
        $data =  $this->adService->getAllAds();
        return $this->returnData($data);
    }


    public function store(StoreAdsRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $ad = $this->adService->createNewAd($request->validated());
        return $this->returnData($ad);

    }

    public function show($id)
    {
        $ad = $this->adService->showAd($id);
        return $this->returnData($ad);
    }

    public function update(StoreAdsRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $ad = $this->adService->updateAd($id,$request->validated());
        return $this->returnData($ad , 'Ad Updated Successfully');
    }


    public function delete($id)
    {
        $this->adService->deleteAd($id);
        return $this->returnSuccessMessage('Ad Deleted Successfully');
    }
}
