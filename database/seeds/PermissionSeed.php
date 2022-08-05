<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'UPDATE_PROFILE_ANGGOTA']);
        Permission::create(['name' => 'UPDATE_PROFILE_STUDENT']);
        Permission::create(['name' => 'UPDATE_PROFILE_EMPLOYEE']);
        Permission::create(['name' => 'CREATE_PROPOSAL']);
        Permission::create(['name' => 'CREATE_REVISION']);
        Permission::create(['name' => 'UPDATE_REVISION']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL']);
        Permission::create(['name' => 'VIEW_PROPOSAL']);
    }
}
