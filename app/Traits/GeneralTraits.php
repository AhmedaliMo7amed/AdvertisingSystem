<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait GeneralTraits
{

    public function replaceSpaces($string){
        return str_replace(' ', '-',$string);
    }

}
