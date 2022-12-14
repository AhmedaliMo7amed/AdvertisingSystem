<?php

namespace Database\Factories;

use App\Models\advertiser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;

class AdvertiserFactory extends Factory
{

    protected $model = advertiser::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique('true')->safeEmail(),
            'phone'=> $this->faker->numerify('010########')
        ];
    }
}
