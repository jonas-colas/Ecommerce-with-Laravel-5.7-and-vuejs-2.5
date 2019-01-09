<?php

use App\Featureimage;
use Illuminate\Database\Seeder;

class FeatureimagesTableSeeder extends Seeder
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
            Featureimage::create([
                'product_id' => $i,
                'featureimage' => '1 - Copy ('.$i.').jpg',
            ]);
        }

    }
}
