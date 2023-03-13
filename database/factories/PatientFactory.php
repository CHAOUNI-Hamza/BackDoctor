<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'photo' => $this->faker->imageUrl(),
            'sex' => $this->faker->randomElement(['M', 'F']),
            'blood_group' => $this->faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
            'total_income' => $this->faker->randomFloat(2, 0, 1000000),
            'status' => $this->faker->randomElement(['S', 'M']),
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'date_of_birth' => $this->faker->date(),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'password' => bcrypt('password'),
        ];
    }
}
