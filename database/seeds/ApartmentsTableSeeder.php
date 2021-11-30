<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use App\Apartment;
use App\User;
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
        $faker = FakerFactory::create('it_IT');
        $users = User::all();
        $cities = config('cities');

        foreach($users as $user) {
            $newApartment = new Apartment();
            $newApartment->user_id = $user->id;
            $newApartment->name = $faker->company() . ' B&B';
            $newApartment->description = $faker->realText();
            $newApartment->num_rooms = $faker->numberBetween(1,8);
            $newApartment->num_beds = $faker->numberBetween(1,10);
            $newApartment->num_bathrooms = $faker->numberBetween(1, 3);
            $newApartment->square_meters = $faker->numberBetween(50, 300);
            // $newApartment->city = $cities[rand(0, count($cities))];
            $newApartment->address = $faker->streetAddress();
            $newApartment->lat = $faker->latitude($min = -90, $max = 90);
            $newApartment->lon = $faker->longitude($min = -180, $max = 180);
            $newApartment->slug = Str::slug($newApartment->name);
            $newApartment->save();
        }
    }
}
