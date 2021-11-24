<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;
use Illuminate\Support\Str;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {
            $newApartment = new Apartment();
            $newApartment->user_id = $i + 1;
            $newApartment->name = $faker->company() . ' ' . 'B&B';
            $newApartment->description = $faker->text();
            $newApartment->num_rooms = $faker->numberBetween(1,20);
            $newApartment->num_beds = $faker->numberBetween(1,20);
            $newApartment->num_bathrooms = $faker->numberBetween(1,20);
            $newApartment->square_meters = $faker->numberBetween(20, 1000);
            $newApartment->address = $faker->streetAddress();
            $newApartment->lat = $faker->latitude($min = -90, $max = 90);
            $newApartment->lon = $faker->longitude($min = -180, $max = 180);
            $newApartment->slug = Str::slug($newApartment->name);
            $newApartment->save();
        }
    }
}
