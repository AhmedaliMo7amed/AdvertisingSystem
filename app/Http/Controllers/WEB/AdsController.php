<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdsRequest;
use App\Models\advertiser;
use App\Services\AdService;
use App\Services\AdvertiserService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    use ResponseTrait;
    protected $adService;
    protected $advertiserService;
    protected $categoryService;
    protected $tagService;

    public function __construct(AdService $adService , AdvertiserService $advertiserService , CategoryService $categoryService ,TagService $tagService)
    {
        $this->adService = $adService;
        $this->advertiserService = $advertiserService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;

    }

    public function index()
    {
        $categories =  $this->categoryService->getAllCategories();
        $tags = $this->tagService->getAllTags();
        $data =  $this->adService->getAllAds();
        return view('ads.index', compact(['data','categories','tags']));

    }

    public function show($id)
    {
        $advertisers = $this->advertiserService->getAllAdvertisers();
        $categories =  $this->categoryService->getAllCategories();
        $tags = $this->tagService->getAllTags();
        $ad = $this->adService->showAd($id);
        return view('ads.edit', compact(['ad' ,'advertisers','categories','tags']));

    }

    public function store(StoreAdsRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $ad = $this->adService->createNewAd($request->validated());
        return redirect()->back()->with('status', 'Ads Created Successfully');

    }

    public function update(StoreAdsRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $this->adService->updateAd($id,$request->validated());
        return redirect()->back()->with('status', 'Ad Updated Successfully');
    }

    public function delete($id)
    {
        $this->adService->deleteAd($id);
        return redirect()->route('ads.index')->with('status','Ad Deleted Successfully');
    }

    public function create()
    {
        $advertisers = $this->advertiserService->getAllAdvertisers();
        $categories =  $this->categoryService->getAllCategories();
        $tags = $this->tagService->getAllTags();
        return view('ads.create', compact(['advertisers','categories','tags']));
    }
}
