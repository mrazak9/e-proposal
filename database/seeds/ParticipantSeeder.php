<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // check if table users is empty
         if(DB::table('participant_type')->count() == 0){

            DB::table('participant_type')->insert([

                [
                    'name' => 'Internal',
                    'notes' => '-',
                ],
                [
                    'name' => 'Eksternal',
                    'notes' => '-',
                ]
            ]);
            
        } else { echo "\eTable is not empty, therefore NOT "; }
    }
}
