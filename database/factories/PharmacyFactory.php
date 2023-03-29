<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pharmacy;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
        'category_id'=> function () {
            return \App\Models\Category::factory()->create()->id;
        },
        'address' => $this->faker->address,
        'administrator' => $this->faker->name,
        'phone' => $this->faker->phoneNumber,
        'photo' => $this->faker->imageUrl(640, 480, 'pharmacy'),
        'about' => $this->faker->paragraphs(3, true),
        'location' => 'DB::raw("(POINT($this->faker->latitude(), $this->faker->longitude()))")'
        ];
    }
}
