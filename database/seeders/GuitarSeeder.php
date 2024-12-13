<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Guitar;
use App\Models\Artist;

class GuitarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimeStamp = Carbon::now();
            $guitars = ([
                ['type' => 'stratocaster', 'colour' => 'red', 'price' => 400, 'brand' => 'fender', 'updated_at' => $currentTimeStamp , 'created_at' => $currentTimeStamp, 'image' => 'guitar1.jpg'],
                ['type' => 'telecaster', 'colour' => 'blue', 'price' => 600, 'brand' => 'fender',  'updated_at' => $currentTimeStamp, 'created_at' => $currentTimeStamp, 'image' => 'guitar2.jpg'],
                ['type' => 'stratocaster', 'colour' => 'red', 'price' => 400, 'brand' => 'fender', 'updated_at' => $currentTimeStamp, 'created_at' => $currentTimeStamp, 'image' => 'guitar3.jpg']]
            );

        foreach ($guitars as $guitarData)
        {
            $guitar = Guitar::create(array_merge($guitarData, ['created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]));

            $artists = Artist::inRandomOrder()->take(2)->pluck('id');

            $guitar->artists()->attach($artists);
        }
    }
}
