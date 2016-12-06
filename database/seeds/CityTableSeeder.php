<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cities')->truncate();

      $csv = array_map('str_getcsv', file(public_path('citiesTable1.csv')));

      for ($i = 0; $i < count($csv); $i++) {
          DB::table('cities')->insert([
              'id' => $csv[$i][0],
              'name' => $csv[$i][1],
              'province_id' => $csv[$i][2],
              'created_at' => Date('Y-m-d H:i:s'),
              'updated_at' => Date('Y-m-d H:i:s')
          ]);
      }
    }
}
