<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(CategoriesTableSeeder::class);
      $this->call(TagsTableSeeder::class);
      $this->call(ProductsTableSeeder::class);
      $this->call(FeatureimagesTableSeeder::class);
      $this->call(ImagesTableSeeder::class);

   }
}
