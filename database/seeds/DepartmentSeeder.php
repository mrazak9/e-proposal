<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmens = [
            [
                'name'         => 'Program Studi SI'
            ],
            [
                'name'         => 'Program Studi IF'
            ],
            [
                'name'         => 'Program Studi KA'
            ],
            [
                'name'         => 'Program Studi AB'
            ]
        ];

        Department::insert($departmens);
    }
}
