<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(OrganizationSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(ParticipantSeeder::class);
    }
}
