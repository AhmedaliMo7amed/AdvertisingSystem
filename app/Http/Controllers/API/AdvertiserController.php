<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdsRequest;
use App\Http\Requests\StoreAdvertiserRequest;
use App\Models\advertiser;
use App\Services\AdvertiserService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    use ResponseTrait;
    protected $advertiserService;

    public function __construct(AdvertiserService $advertiserService)
    {
        $this->advertiserService = $advertiserService;
    }

    public function index()
    {
        $data =  $this->advertiserService->getAllAdvertisers();
        return $this->returnData($data);
    }


    public function store(StoreAdvertiserRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $advertiser = $this->advertiserService->createNewAdvertiser($request->validated());
        return $this->returnData($advertiser);

    }

    public function show($id)
    {
        $advertiser = $this->advertiserService->showAdvertiser($id);
        return $this->returnData($advertiser);
    }

    public function update(StoreAdvertiserRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $advertiser = $this->advertiserService->updateAdvertiser($id,$request->validated());
        return $this->returnData($advertiser , 'Advertiser Updated Successfully');
    }


    public function delete($id)
    {
        $this->advertiserService->deleteAdvertiser($id);
        return $this->returnSuccessMessage('Advertiser Deleted Successfully');
    }

    public function advertiserAds($id)
    {
        $advertiser = $this->advertiserService->getAdvertiserAds($id);
        return $this->returnData($advertiser);
    }
}
