<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('provinces')->truncate();
        $csv = array_map('str_getcsv', file(public_path('provincesTable1.csv')));

        for ($i = 0; $i < count($csv); $i++) {
            DB::table('provinces')->insert([
                'id' => $csv[$i][0],
                'name' => $csv[$i][1],
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s')
            ]);
        }
      }
    }
