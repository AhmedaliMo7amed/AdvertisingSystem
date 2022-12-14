<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $hidden = array('pivot');

    protected $fillable = [
        'name' ,
        'slug',
    ];

    public function ads(){
        return $this->belongsToMany(ad::class,adTags::class);
    }

//    public function setSlugAttribute($value)
//    {
//        if (!is_null($value)) {
//            $this->attributes['slug'] = str_replace(' ', '-', $value);
//        }
//        $this->attributes['slug'] = $this->attributes['name'];
//
//    }

}
