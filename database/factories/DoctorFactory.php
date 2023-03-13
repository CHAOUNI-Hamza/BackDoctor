<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            'specialite' => $this->faker->randomElement(['Cardiologue', 'Dentiste', 'Ophtalmologue', 'Gynécologue']),
            'membre_since' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'date' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'password' => bcrypt('password'),
            'phone' => $this->faker->phoneNumber,
            'clinicname' => $this->faker->company,
            'clinicadresse' => $this->faker->streetAddress,
            'clinicimage' => $this->faker->imageUrl(),
            'adresse_one' => $this->faker->streetAddress,
            'adresse_two' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'code_postal' => $this->faker->postcode,
            'pricing' => $this->faker->randomFloat(2, 50, 200),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
