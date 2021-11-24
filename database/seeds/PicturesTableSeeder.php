<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use App\Picture;
use Faker\Generator as Faker;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $apartments = Apartment::all();

        // foreach($apartments as $apartment) {
        //     $newPicture = new Picture();
        //     $newPicture->apartment_id = $apartment->id;
        //     $newPicture->path = $faker->image(null, '600', '450', 'animals', true);
        //     $newPicture->save();
        // }
    }
}
