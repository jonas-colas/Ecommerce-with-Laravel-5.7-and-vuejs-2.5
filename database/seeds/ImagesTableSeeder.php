<?php

use App\Images;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Laptops
        for ($i=1; $i <= 50; $i++) {
            Images::create([
                'product_id' => $i,
                'images' => '1 - Copy ('.$i.').jpg',
            ]);
        }

    }
}
