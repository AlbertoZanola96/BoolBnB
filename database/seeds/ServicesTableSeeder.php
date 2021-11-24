<?php

use Illuminate\Database\Seeder;
use App\Service;
use Illuminate\Support\Str;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = config('extra-services');
       
        foreach($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->slug = Str::slug($newService->name);
            $newService->save();
        }
    }

}
