<?php

namespace Database\Factories;

use App\Models\ad;
use App\Models\advertiser;
use App\Models\category;
use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    protected $model = ad::class;

    public function definition()
    {
        return [
             'advertiser_id' => advertiser::all()->random()->id,
             'category_id' => category::all()->random()->id,
             'type' => $this->faker->randomElement(['free','paid']),
             'title' => $this->faker->realText(30),
             'description'=> $this->faker->realText('50') ,
             'start_date' => $this->faker->date(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ad $ad) {
            $ad->tags()->attach(tag::inRandomOrder()->take(random_int(1, 10))->pluck('id'));
        });
    }
}
