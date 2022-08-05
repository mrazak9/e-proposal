<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'ADMIN']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'KETUA_HIMAKOM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');

        $role = Role::create(['name' => 'KETUA_BEM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');

        $role = Role::create(['name' => 'KETUA_BPM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');

        $role = Role::create(['name' => 'PEMBINA']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');

        $role = Role::create(['name' => 'KAPRODI']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');

        $role = Role::create(['name' => 'REKTOR']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');

        $role = Role::create(['name' => 'BAS']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
    }
}
