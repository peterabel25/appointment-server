<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'date'=>Carbon::now(),
            'time'=>Carbon::now(),
            'location'=>$this->faker->streetAddress(),
            'booking_status'=>true,
            'price'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 1000, $max = NULL),
            'longitude'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'latitude'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'mother_id'=>$this->faker->randomDigitNot(0) ,
            'midwife_id'=>$this->faker->randomDigitNot(0) ,
            
                   
        ];
    }
}
