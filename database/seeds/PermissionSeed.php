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
        Permission::create(['name' => 'VIEW_REVISION']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_HIMA']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_BEM']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_BPM']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_PEMBINA']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_KAPRODI']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_REKTOR']);
        Permission::create(['name' => 'PROPOSAL_APPROVAL_BAS']);
        Permission::create(['name' => 'VIEW_PROPOSAL']);
        Permission::create(['name' => 'PANITIA_UPDATE_PROPOSAL']);
        Permission::create(['name' => 'PANITIA_VIEW_PROPOSAL']);
        Permission::create(['name' => 'MANAGE_MASTER_DATA']);
        Permission::create(['name' => 'NO_ACCESS']);
    }
}
