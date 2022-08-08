<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('places')->count() == 0){

            DB::table('places')->insert([

                [
                    'name' => 'Gedung Serba Guna - IDE LPKIA',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 1',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 2',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 3',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 4',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 5',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 7',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 7',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 8',
                    'notes' => '-',
                ],
                [
                    'name' => 'LABKOM 9',
                    'notes' => '-',
                ],

            ]);
            
        } else { echo "\eTable is not empty, therefore NOT "; }
    }
}
