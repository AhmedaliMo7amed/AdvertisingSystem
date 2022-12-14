<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\FilterService;
use App\Services\TagService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    use ResponseTrait;
    public $filterService;

    public function __construct(FilterService $filterService ,  CategoryService $categoryService ,TagService $tagService)
    {
        $this->filterService = $filterService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    public function filterByCategory(Request $request)
    {
        $categories =  $this->categoryService->getAllCategories();
        $tags = $this->tagService->getAllTags();
        $data = $this->filterService->getAdsByCategory($request->input('id'));
        return view('ads.index', compact(['data','categories','tags']));

    }

    public function filterByTag(Request $request)
    {
        $categories =  $this->categoryService->getAllCategories();
        $tags = $this->tagService->getAllTags();
        $data = $this->filterService->getAdsByTag($request->input('id'));
        return view('ads.index', compact(['data','categories','tags']));    }

}
