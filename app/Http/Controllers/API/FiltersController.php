<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\FilterService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    use ResponseTrait;
    protected $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function filterByCategory($id)
    {
        $ads = $this->filterService->getAdsByCategory($id);
        return $this->returnData($ads);
    }

    public function filterByTag($id)
    {
        $ads = $this->filterService->getAdsByTag($id);
        return $this->returnData($ads);
    }

}
