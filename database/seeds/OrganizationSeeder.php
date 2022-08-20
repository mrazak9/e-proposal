<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('organizations')->count() == 0){

            DB::table('organizations')->insert([

                [
                    'name' => 'Himpunan Mahasiswa Informatika',
                    'singkatan' => 'HIMATIK',
                    'type' => 'HIMA',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Himpunan Mahasiswa Komputerisasi Akuntansi',
                    'singkatan' => 'HIMAKOMPAK',
                    'type' => 'HIMA',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Himpunan Mahasiswa Administrasi Bisnis',
                    'singkatan' => 'HIMAADBIS',
                    'type' => 'HIMA',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Badan Eksekutif Mahasiswa',
                    'singkatan' => 'BEM',
                    'type' => 'BEM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Badan Perwakilan Mahasiswa',
                    'singkatan' => 'BPM',
                    'type' => 'BPM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Barudak Seni Computer',
                    'singkatan' => 'BASCOM',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'DKM Jundullah',
                    'singkatan' => 'DKM',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'LPKIA English Club',
                    'singkatan' => 'LEC',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Himpunan Pengusaha Muda Indonesia',
                    'singkatan' => 'HIPMI',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'LPKIA Basket Ballers',
                    'singkatan' => 'BASKET',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Taekwondo LPKIA',
                    'singkatan' => 'TAEKWONDO',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'LPKIA Futsal',
                    'singkatan' => 'FUTSAL',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'HIMAPA Osiris',
                    'singkatan' => 'OSIRIS',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'LPKIA PMK',
                    'singkatan' => 'PMK',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Korps Suka Rela LPKIA',
                    'singkatan' => 'KSR',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'KREAKAM LPKIA',
                    'singkatan' => 'KREAKAM',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Paduan Suara LPKIA',
                    'singkatan' => 'PADUS',
                    'type' => 'UKM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'LPKIA Object Oriented Programming Community',
                    'singkatan' => 'LOOP',
                    'type' => 'KSM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Multimedia On Visual Education',
                    'singkatan' => 'MOVE',
                    'type' => 'KSM',
                    'head_organization' => '-',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);
            
        } else { echo "\eTable is not empty, therefore NOT "; }
    }
}
