<?php

use Illuminate\Database\Seeder;
use App\Models\PinHistory;

class PinHistorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Array of Pin History.
        $pinHistories = [
            [
                'pin_id' => 1,
                'latitude' => 35.2278971,
                'longitude' => -80.8432467,
            ],
            [
                'pin_id' => 1,
                'latitude' => 35.2278971,
                'longitude' => -80.8432467,
            ],
            [
                'pin_id' => 2,
                'latitude' => 35.2278971,
                'longitude' => -80.8432467,
            ],
            [
                'pin_id' => 2,
                'latitude' => 35.2278971,
                'longitude' => -80.8432467,
            ],
            [
                'pin_id' => 3,
                'latitude' => 35.2278971,
                'longitude' => -80.8432467,
            ],
        ];

        foreach ($pinHistories as $pinHistory) {
            PinHistory::create([
                'pin_id' => $pinHistory['pin_id'],
                'latitude' => $pinHistory['latitude'],
                'longitude' => $pinHistory['longitude'],
            ]);
        }
    }

}
