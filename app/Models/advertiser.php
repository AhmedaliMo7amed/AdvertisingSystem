<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertiser extends Model
{
    use HasFactory;

    protected $table = 'advertisers';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function ads(){
        return $this->hasMany(ad::class);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = str_replace(' ', '', $value);
    }

}
