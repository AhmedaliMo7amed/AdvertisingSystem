<?php

namespace App\Services;

use App\Models\ad;
use App\Models\adTags;
use App\Models\category;
use App\Traits\ResponseTrait;

class FilterService{

    use ResponseTrait;

    public function getAdsByCategory($id){
        $ads = ad::where('category_id',$id)->get();
        return $ads;
    }

    public function getAdsByTag($id){
        $ads = ad::whereHas('tags', function($q) use($id) {
            $q->where('tag_id', $id);
        })->get();

        return $ads;
    }



}
