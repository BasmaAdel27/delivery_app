<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use App\Models\Setting;
use App\Models\Subscription;
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

        $user = \App\Models\User::factory()->create([
            'email' =>'admin@truckco.com',
            'user_type'=>'admin'
        ]);

        User::factory(20)->create();
    }
}
