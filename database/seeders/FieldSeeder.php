<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array('date', 'number', 'string', 'boolean');
        DB::table('fields')->insert([
            'subscriber_id' => \App\Models\Subscriber::factory()->create()->id,
            'title' => Str::random(10),
            'type'  => array_rand($types),
        ]);
    }
}
