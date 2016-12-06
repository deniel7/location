<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
      DB::table('stores')->truncate();

      $csv = array_map('str_getcsv', file(public_path('storesTable1.csv')));

      for ($i = 0; $i < count($csv); $i++) {
          DB::table('stores')->insert([
              'store_code' => $csv[$i][0],
              'initial' => $csv[$i][1],
              'name' => $csv[$i][2],
              'address' => $csv[$i][3],
              'city' => $csv[$i][4],
              'phone' => $csv[$i][5],
              'region' => $csv[$i][6],
              'created_at' => Date('Y-m-d H:i:s'),
              'updated_at' => Date('Y-m-d H:i:s')
          ]);
      }
    }
}
