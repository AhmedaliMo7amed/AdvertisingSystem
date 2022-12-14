<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvertiserRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Services\CategoryService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;
    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data =  $this->categoryService->getAllCategories();
        return $this->returnData($data);
    }


    public function store(StoreCategoryRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $category = $this->categoryService->CreateNewCategory($request->validated());
        return $this->returnData($category);

    }

    public function show($id)
    {
        $category = $this->categoryService->showCategory($id);
        return $this->returnData($category);
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $category = $this->categoryService->updateCategory($id,$request->validated());
        return $this->returnData($category , 'Category Updated Successfully');
    }


    public function delete($id)
    {
        $this->categoryService->deleteCategory($id);
        return $this->returnSuccessMessage('Category Deleted Successfully');

    }

}
