<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('districts')->truncate();

      $csv = array_map('str_getcsv', file(public_path('districtsTable1.csv')));

      for ($i = 0; $i < count($csv); $i++) {
          DB::table('districts')->insert([
              'id' => $csv[$i][0],
              'name' => $csv[$i][1],
              'city_id' => $csv[$i][2],
              'created_at' => Date('Y-m-d H:i:s'),
              'updated_at' => Date('Y-m-d H:i:s')
          ]);
      }
    }
}
