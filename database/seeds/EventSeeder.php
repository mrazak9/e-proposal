<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('events')->count() == 0){

            DB::table('events')->insert([

                [
                    'name' => 'Seminar',
                    'notes' => '-',
                ],
                [
                    'name' => 'Workshop',
                    'notes' => '-',
                ],
                [
                    'name' => 'Super Mega Workshop',
                    'notes' => '-',
                ],
                [
                    'name' => 'Goes to School',
                    'notes' => '-',
                ],
                [
                    'name' => 'Webinar',
                    'notes' => '-',
                ]

            ]);
            
        } else { echo "\eTable is not empty, therefore NOT "; }
    }
}
