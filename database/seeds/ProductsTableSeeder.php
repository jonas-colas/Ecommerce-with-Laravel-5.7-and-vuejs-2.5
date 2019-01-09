<?php

use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Factory::create();

      $now = Carbon::now()->toDateTimeString();

        for ($i=1; $i <= 10; $i++) {
            $Product = Product::create([
                'title' => $faker->sentence,
                'short_description' => $faker->paragraph(mt_rand(1, 10)),
                'description' => $faker->paragraph(mt_rand(10, 20)),
                'screen_size' => $faker->randomDigit,
                'item_dimensions' => $faker->randomDigit,
                'screen_weight' => $faker->randomDigit.'kg',
                'model_year' => '201'.$faker->randomDigit,
                'resolution' => $faker->randomDigit.'k',
                'total_hdmi_ports' => $faker->randomDigit,
                'price' => $faker->numberBetween($min = 100, $max = 1000),
                'featured' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $Product->categories()->attach(1);
            $Product->tags()->attach(1);
        }

        for ($i = 1; $i <= 10; $i++) {
            $Product = Product::create([
              'title' => $faker->sentence,
              'short_description' => $faker->paragraph(mt_rand(1, 10)),
              'description' => $faker->paragraph(mt_rand(10, 20)),
              'screen_size' => $faker->randomDigit,
              'item_dimensions' => $faker->randomDigit,
              'screen_weight' => $faker->randomDigit.'kg',
              'model_year' => '201'.$faker->randomDigit,
              'resolution' => $faker->randomDigit.'k',
              'total_hdmi_ports' => $faker->randomDigit,
              'price' => $faker->numberBetween($min = 100, $max = 1000),
              'featured' => '1',
              'created_at' => $now,
              'updated_at' => $now,
            ]);
            $Product->categories()->attach(2);
            $Product->tags()->attach(2);
        }

        for ($i = 1; $i <= 10; $i++) {
            $Product = Product::create([
              'title' => $faker->sentence,
              'short_description' => $faker->paragraph(mt_rand(1, 10)),
              'description' => $faker->paragraph(mt_rand(10, 20)),
              'screen_size' => $faker->randomDigit,
              'item_dimensions' => $faker->randomDigit,
              'screen_weight' => $faker->randomDigit.'kg',
              'model_year' => '201'.$faker->randomDigit,
              'resolution' => $faker->randomDigit.'k',
              'total_hdmi_ports' => $faker->randomDigit,
              'price' => $faker->numberBetween($min = 100, $max = 1000),
              'featured' => '1',
              'created_at' => $now,
              'updated_at' => $now,
            ]);
            $Product->categories()->attach(3);
            $Product->tags()->attach(3);
        }

        for ($i = 1; $i <= 10; $i++) {
            $Product = Product::create([
              'title' => $faker->sentence,
              'short_description' => $faker->paragraph(mt_rand(1, 10)),
              'description' => $faker->paragraph(mt_rand(10, 20)),
              'screen_size' => $faker->randomDigit,
              'item_dimensions' => $faker->randomDigit,
              'screen_weight' => $faker->randomDigit.'kg',
              'model_year' => '201'.$faker->randomDigit,
              'resolution' => $faker->randomDigit.'k',
              'total_hdmi_ports' => $faker->randomDigit,
              'price' => $faker->numberBetween($min = 100, $max = 1000),
              'featured' => '1',
              'created_at' => $now,
              'updated_at' => $now,
            ]);
            $Product->categories()->attach(4);
            $Product->tags()->attach(4);
        }

        for ($i = 1; $i <= 10; $i++) {
            $Product = Product::create([
              'title' => $faker->sentence,
              'short_description' => $faker->paragraph(mt_rand(1, 10)),
              'description' => $faker->paragraph(mt_rand(10, 20)),
              'screen_size' => $faker->randomDigit,
              'item_dimensions' => $faker->randomDigit,
              'screen_weight' => $faker->randomDigit.'kg',
              'model_year' => '201'.$faker->randomDigit,
              'resolution' => $faker->randomDigit.'k',
              'total_hdmi_ports' => $faker->randomDigit,
              'price' => $faker->numberBetween($min = 100, $max = 1000),
              'featured' => '1',
              'created_at' => $now,
              'updated_at' => $now,
            ]);
            $Product->categories()->attach(5);
            $Product->tags()->attach(5);
        }
    }
}
