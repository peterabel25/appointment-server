<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

           
            'physical_address'=>$this->faker->streetAddress(),
            
            
            'longitude'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'latitude'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            
            'user_id'=>$this->faker->randomDigitNot(0) ,
            
        ];
    }
}
