<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Guitar;

class GuitarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimeStamp = Carbon::now();
            Guitar::insert([
                ['type' => 'stratocaster', 'colour' => 'red', 'price' => 400, 'brand' => 'fender', 'updated_at' => $currentTimeStamp , 'created_at' => $currentTimeStamp],
                ['type' => 'telecaster', 'colour' => 'blue', 'price' => 600, 'brand' => 'fender',  'updated_at' => $currentTimeStamp, 'created_at' => $currentTimeStamp],
                ['type' => 'stratocaster', 'colour' => 'red', 'price' => 400, 'brand' => 'fender', 'updated_at' => $currentTimeStamp, 'created_at' => $currentTimeStamp]]
            );
    }
}
