<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Services\TagService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    use ResponseTrait;
    public $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $data =  $this->tagService->getAllTags();
        return view('tags.index')->with('data',$data);
    }

    public function show($id)
    {
        $tag = $this->tagService->showTag($id);
        return view('tags.edit')->with('data',$tag);
    }

    public function store(StoreTagRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $tag = $this->tagService->CreateNewTag($request->validated());
        return redirect()->back()->with('status', 'Tag Created Successfully');

    }


    public function update(StoreTagRequest $request, $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->back()->with('error', $request->validator->errors()->first());
        }
        $this->tagService->updateTag($id,$request->validated());
        return redirect()->back()->with('status', 'Tag Updated Successfully');
    }


    public function delete($id)
    {
        $this->tagService->deleteTag($id);
        return redirect()->route('tags.index')->with('status','Tag Deleted Successfully');

    }
}
