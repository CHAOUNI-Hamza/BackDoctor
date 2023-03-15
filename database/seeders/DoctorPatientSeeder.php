<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Patient;

class DoctorPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        foreach ($doctors as $doctor) {
            $doctor->patients()->attach($patients->random(rand(1, 5))->pluck('id')->toArray());
        }
    }
}
