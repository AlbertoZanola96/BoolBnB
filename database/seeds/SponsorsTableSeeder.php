<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'name' => 'Bronze',
                'price' => 2.99,
                'duration_in_days' => 1
            ],
            [
                'name' => 'Silver',
                'price' => 5.99,
                'duration_in_days' => 3
            ],
            [
                'name' => 'Gold',
                'price' => 9.99,
                'duration_in_days' => 6
            ]
        ];

        foreach($sponsors as $sponsor) {
            $newSponsor = new Sponsor();
            $newSponsor->name = $sponsor['name'];
            $newSponsor->price = $sponsor['price'];
            $newSponsor->duration_in_days = $sponsor['duration_in_days'];
            $newSponsor->save();
        }
    }
}
