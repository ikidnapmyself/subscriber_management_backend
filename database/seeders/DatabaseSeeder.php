<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // $this->call([
        //     SubscriberSeeder::class,
        //     FieldSeeder::class
        // ]);

        \App\Models\Subscriber::factory(10)->hasfields(2)->create();
       
    }
}
