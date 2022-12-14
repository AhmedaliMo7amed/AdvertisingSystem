<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ad extends Model
{
    use HasFactory;

    protected $table = 'ads';
    protected $hidden = array('pivot');


    protected $fillable = [
        'advertiser_id' ,
        'category_id',
        'type',
        'title',
        'description',
        'start_date'
    ];

    public function advertiser()
    {
        return $this->belongsTo(advertiser::class , 'advertiser_id');
    }

    public function category()
    {
        return $this->belongsTo(category::class , 'category_id');
    }

    public function tags(){
        return $this->belongsToMany(tag::class,adTags::class);
    }

}
