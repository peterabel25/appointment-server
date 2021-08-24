<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Location;
use App\Models\Midwife;
use App\Models\Mother;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Appointment::factory(100)->create();
        Midwife::factory(100)->create();
        Mother::factory(100)->create();
        Payment::factory(100)->create();
        User::factory(100)->create();
        Location::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
