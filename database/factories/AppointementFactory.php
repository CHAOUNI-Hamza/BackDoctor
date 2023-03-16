<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointement;

class AppointementFactory extends Factory
{
    protected $model = Appointement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'disease' => $this->faker->word(),
            'consultation_type' => $this->faker->word(),
            'date_time' => $this->faker->dateTime(),
            'amount' => $this->faker->randomFloat(2, 50, 200),
            'status' => $this->faker->randomElement(['pending', 'approved', 'cancelled']),
            'patient_id' => function () {
                return \App\Models\Patient::factory()->create()->id;
            },
            'doctor_id' => function () {
                return \App\Models\Doctor::factory()->create()->id;
            },
        ];
    }
}
