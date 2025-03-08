<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'NENG SUSI SUSILAWATI SUGIANA', 'email' => 'nengsusi@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'IRSAN HERLANDI PUTRA', 'email' => 'irsanherlandiputra@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'RAHAYU SRI PURNAMI', 'email' => 'rahayusri@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'JANADI RAMMELSBERGI THAMRIN, S.PT., M.M.', 'email' => 'janadithamrin@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'ADIL MUSTY TAMZIL', 'email' => 'adil.tamzil@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'ANUM DAHLIA', 'email' => 'anum@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'ANNI YULIAH', 'email' => 'anni@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'ETI SUPRAHITIN', 'email' => 'eti.s@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'TRI RAMDHANY', 'email' => 'triramdhany@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'MUSTAKIM RIJA', 'email' => 'mustakim@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'AHMAD NUKMAN GINANJAR', 'email' => 'ahmad.nukman@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'SRI KURNIASH', 'email' => 'sri.kurnniasih@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'TINI MARTINI', 'email' => 'niemartini@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'TJANG KIAN LIONG', 'email' => 'change@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'DONI', 'email' => 'doni@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'SYAEPUDIN', 'email' => 'syaepudin@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'SNMP SIMAMORA', 'email' => 'snmpsimamora@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'CHAREL SAMUEL MATULESSY', 'email' => 'charel@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'HENDI KURNIA PERMANA', 'email' => 'hendikurniapermana@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'ELIZA VIANDRAYANI AZIZ', 'email' => 'eliza@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'DEDE ISMAIL', 'email' => 'dede.ismail@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'SRI ARTATIE', 'email' => 'sriartatie@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'RAUDATUL MEDINA', 'email' => 'r.medina@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'ERIKSON P SITUMORANG', 'email' => 'erikson@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'IMAS ANGGRAENI', 'email' => 'imasanggraeni@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'JENNIFER YUNANI', 'email' => 'jen.yunani@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
            ['name' => 'INDRA PURNAMA', 'email' => 'indrapurnama@lpkia.ac.id', 'password' => bcrypt('lpkiajaya1984')],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            $user->assignRole('ANGGOTA_PENELITIAN');
        }
    }
}
