<?php

use Illuminate\Database\Seeder;
use App\Models\Pin;

class PinSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // array of specific Pins to populate database
        $pins = [
            [
                'rfidNumber' => 'ABC001',
                'latitude' => 35.2278971,
                'longitude' => -80.8432467,
            ],
            [
                'rfidNumber' => 'ABC253',
                'latitude' => 35.2226803,
                'longitude' => -80.8482953,
            ],
            [
                'rfidNumber' => 'ABC456',
                'latitude' => 35.2226803,
                'longitude' => -80.8482953,
            ],
        ];

        foreach ($pins as $pin) {
            Pin::create([
                'rfidNumber' => $pin['rfidNumber'],
                'latitude' => $pin['latitude'],
                'longitude' => $pin['longitude'],
            ]);
        }
    }

}
