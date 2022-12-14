<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreTagRequest;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    use ResponseTrait;
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $data =  $this->tagService->getAllTags();
        return $this->returnData($data);
    }


    public function store(StoreTagRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $tag = $this->tagService->CreateNewTag($request->validated());
        return $this->returnData($tag);

    }

    public function show($id)
    {
        $tag = $this->tagService->showTag($id);
        return $this->returnData($tag);
    }

    public function update(StoreTagRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->returnError($request->validator->errors()->first());
        }
        $tag = $this->tagService->updateTag($id,$request->validated());
        return $this->returnData($tag , 'Tag Updated Successfully');
    }


    public function delete($id)
    {
        $this->tagService->deleteTag($id);
        return $this->returnSuccessMessage('Tag Deleted Successfully');

    }
}
