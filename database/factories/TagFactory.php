<?php

namespace Database\Factories;

use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    protected $model = tag::class;

    public function definition()
    {
        $name = $this->faker->word();
        $slug = $name;
        return [
            'name' => $name ,
            'slug' => $slug
        ];
    }
}
