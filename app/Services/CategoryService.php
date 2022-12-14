<?php

namespace App\Services;

use App\Models\category;
use App\Traits\ResponseTrait;

class CategoryService{

    use ResponseTrait;
    public function getAllCategories(){
        return category::all();
    }

    public function createNewCategory($data){
        $category = category::create($data);
        return $category;
    }

    public function showCategory($id)
    {
        $category = category::with('ads.tags')->find($id);
        return $category;
    }

    public function updateCategory($id,$data)
    {
        $category = category::find($id);
        $category->update($data);
        return $category;
    }

    public function deleteCategory($id)
    {
        category::find($id)->delete();
    }

}
