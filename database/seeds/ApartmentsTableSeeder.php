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
        $addresses = config('addresses');

        $counter = 0;
        foreach($users as $user) {
            $newApartment = new Apartment();
            $newApartment->user_id = $user->id;
            $newApartment->name = $faker->company() . ' B&B';
            $newApartment->description = $faker->realText();
            $newApartment->num_rooms = $faker->numberBetween(1,8);
            $newApartment->num_beds = $faker->numberBetween(1,10);
            $newApartment->num_bathrooms = $faker->numberBetween(1, 3);
            $newApartment->square_meters = $faker->numberBetween(50, 300);
            $newApartment->address = $addresses[$counter]['address'];
            $newApartment->lat = $addresses[$counter]['lat'];
            $newApartment->lon = $addresses[$counter]['lon'];
            $newApartment->slug = Str::slug($newApartment->name);
            $newApartment->save();
            $counter++;
        }
    }
}
