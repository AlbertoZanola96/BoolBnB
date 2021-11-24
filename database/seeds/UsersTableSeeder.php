<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = FakerFactory::create('it_IT');
        for($i = 0; $i < 50; $i++) {
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->surname = $faker->lastName();
            $newUser->email = $faker->email();
            // $newUser->password = $faker->password();
            $newUser->password = Hash::make($faker->password());
            $newUser->date_of_birth = $faker->date('Y-m-d', '-18 years');
            $newUser->save();
        }
    }
}
