<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertiserRequest;
use App\Services\AdvertiserService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    use ResponseTrait;
    protected $advertiserService;

    public function __construct(AdvertiserService $advertiserService ,  CategoryService $categoryService ,TagService $tagService)
    {
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->advertiserService = $advertiserService;
    }

    public function index()
    {
        $data =  $this->advertiserService->getAllAdvertisers();
        return view('advertiser.index')->with('data',$data);
    }

    public function show($id)
    {
        $advertiser = $this->advertiserService->showAdvertiser($id);
        return view('advertiser.edit')->with('data',$advertiser);
    }

    public function store(StoreAdvertiserRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $this->advertiserService->createNewAdvertiser($request->validated());
        return redirect()->back()->with('status', 'Advertiser Created Successfully');

    }

    public function update(StoreAdvertiserRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $this->advertiserService->updateAdvertiser($id,$request->validated());
        return redirect()->back()->with('status', 'Advertiser Updated Successfully');
    }

    public function delete($id)
    {
        $this->advertiserService->deleteAdvertiser($id);
        return redirect()->route('advertiser.index')->with('status','Advertiser Deleted Successfully');
    }

    public function advertiserAds($id)
    {
        $categories =  $this->categoryService->getAllCategories();
        $tags = $this->tagService->getAllTags();
        $advertiser = $this->advertiserService->getAdvertiserAds($id);
        $data = $advertiser->ads ;
        return view('ads.index', compact(['data','categories','tags']));
    }
}
