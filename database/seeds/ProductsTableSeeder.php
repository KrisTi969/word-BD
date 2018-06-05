<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('products')->insert([
                'title' => $faker->name,
                'type' => 'curvedTV',
                'category' => 'Electronic Appliances',
                'description' =>'{"Specificatii tehnice":[{"Series":"MU6202"},{"Producer":"Samsung"},{"Display type":"Led Backlit"},{"Display size":"89cm"}],"Atlceva":[{"da":"MU62202"}]}',
                'price' => $faker->randomDigitNotNull,
                'quantity' => $faker->randomDigitNotNull,
            ]);
        }
    }*/

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,5) as $index) {
            DB::table('products')->insert([
                'title' => $faker->company,
                'type' => 'printer',
                'category' => 'Computers-and-Accesories',
                    'description' =>'{"Technical specifications":[{"Series":"case"},{"Producer":"Asus"},{"Warranty":"24Months"},{"Display size":"102cm"}],"General":[{"Type":"Phone"},{"Color":"Black"}]}',
                'price' => $faker->randomDigitNotNull,
                'quantity' => $faker->randomDigitNotNull,
            ]);
        }
    }
}
