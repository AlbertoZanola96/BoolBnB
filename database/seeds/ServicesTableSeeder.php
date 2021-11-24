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
        $services = ['Cucina', 'Bagno Privato', 'Aria Condizionata', 'Parcheggio', 'Animali Domestici', 'Servizi in Camera', 'Palestra', 'Wi-Fi', 'Piscina', 'Spa', 'Balcone', 'Vasca', 'Macchina da Caffè', 'Lavatrice'];
       
        foreach($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->slug = Str::slug($newService->name);
            $newService->save();
        }
    }

}
