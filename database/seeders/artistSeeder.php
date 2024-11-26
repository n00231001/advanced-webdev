<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Models\Author;

class artistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::insert([
            ['name' => 'Tom Morello', 'image' => 'Artist1.jpg', 'description' => 'Guitarist of Rage against the machine and SoundGarden.'],
            ['name' => 'Mick Tomson', 'image' => 'Artist2.jpg', 'description' => 'Lead guitarist of slipknot.'],
            ['name' => 'James hetfield', 'image' => 'Artist3.jpg', 'description' => 'rythm guitarist and singer of Metallica.']
        ]);
    }
}
