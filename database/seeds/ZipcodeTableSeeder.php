<?php

use Illuminate\Database\Seeder;

class ZipcodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('zipcodes')->truncate();

      $csv = array_map('str_getcsv', file(public_path('zipcodesTable1.csv')));

      for ($i = 0; $i < count($csv); $i++) {
          DB::table('zipcodes')->insert([
              'id' => $csv[$i][0],
              'name' => $csv[$i][1],
              'district_id' => $csv[$i][2],
              'created_at' => Date('Y-m-d H:i:s'),
              'updated_at' => Date('Y-m-d H:i:s')
          ]);
      }
    }
}
