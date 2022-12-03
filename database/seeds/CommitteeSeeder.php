<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if (DB::table('committee_role')->count() == 0) {

            DB::table('committee_role')->insert([

                [
                    'name' => 'Acara',
                ],
                [
                    'name' => 'Bendahara',
                ],
                [
                    'name' => 'Humas',
                ],
                [
                    'name' => 'Keamanan',
                ],
                [
                    'name' => 'Ketua Pelaksana',
                ],
                [
                    'name' => 'Konsumsi',
                ],
                [
                    'name' => 'Logistik',
                ],
                [
                    'name' => 'Penanggung Jawab',
                ],
                [
                    'name' => 'Publikasi dan Dokumentasi',
                ],
                [
                    'name' => 'Sekretaris',
                ],
                [
                    'name' => 'Wakil Ketua',
                ],
                [
                    'name' => 'Lain-lain',
                ]
            ]);
        } else {
            echo "\eTable is not empty, therefore NOT ";
        }
    }
}
