<?php

namespace App\Services;

use App\Models\category;
use App\Models\tag;
use App\Traits\GeneralTraits;
use App\Traits\ResponseTrait;

class TagService{

    use ResponseTrait , GeneralTraits;

    public function getAllTags(){
        return tag::all();
    }

    public function createNewTag($data){

        if(array_key_exists("slug", $data) && !is_null($data['slug'])) {
            $data['slug'] = $this->replaceSpaces($data['slug']);
            $tag = tag::create($data);
            return $tag;
        }
        // if user didnt enter any slug -->> create custom slug
        $data['slug'] = $this->replaceSpaces($data['name']);
        $tag = tag::create($data);
        return $tag;
    }

    public function showTag($id)
    {
        $tag = tag::find($id);
        return $tag;
    }

    public function updateTag($id,$data)
    {
        $tag = tag::find($id);
        if(array_key_exists("slug", $data)) {
            $data['slug'] = $this->replaceSpaces($data['slug']);
            $tag->update($data);
            return $tag;
        }
        // if user didnt enter any slug -->> create custom slug
        $data['slug'] = $this->replaceSpaces($data['name']);
        $tag->update($data);
        return $tag;
    }

    public function deleteTag($id)
    {
        tag::find($id)->delete();
    }

}
