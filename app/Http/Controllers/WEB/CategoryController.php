<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
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
        return view('categories.index')->with('data',$data);
    }

    public function show($id)
    {
        $category = $this->categoryService->showCategory($id);
        return view('categories.edit')->with('data',$category);
    }


    public function store(StoreCategoryRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $this->categoryService->CreateNewCategory($request->validated());
        return redirect()->back()->with('status', 'Category Created Successfully');

    }


    public function update(StoreCategoryRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $this->categoryService->updateCategory($id,$request->validated());
        return redirect()->back()->with('status', 'Category updated Successfully');
    }


    public function delete($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('category.index')->with('status','Category Deleted Successfully');

    }
}
