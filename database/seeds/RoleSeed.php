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

        $role = Role::create(['name' => 'KETUA_HIMATIK']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_HIMA');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_KSM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_UKM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_HIMAKOMPAK']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_HIMA');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_HIMAADBIS']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_HIMA');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_HIMATIK']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_HIMATIK']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_HIMAKOMPAK']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_HIMAKOMPAK']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_HIMAADBIS']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_HIMAADBIS']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_KSM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_KSM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_UKM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_UKM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_BEM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_BEM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_BPM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_BPM']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_BEM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_BEM');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_BPM']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_BPM');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PEMBINA']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_PEMBINA');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');
        $role->givePermissionTo('APPROVAL_DOP');
        $role->givePermissionTo('PENETAPAN_KETUA');

        $role = Role::create(['name' => 'PEMBINA_KURIKULER']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_PEMBINA');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');
        $role->givePermissionTo('APPROVAL_DOP');
        $role->givePermissionTo('PENETAPAN_KETUA');

        $role = Role::create(['name' => 'PEMBINA_KOKURIKULER']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_PEMBINA');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');
        $role->givePermissionTo('APPROVAL_DOP');
        $role->givePermissionTo('PENETAPAN_KETUA');

        $role = Role::create(['name' => 'KAPRODI']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_KAPRODI');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'REKTOR']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_REKTOR');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'BAS']);
        $role->givePermissionTo('UPDATE_PROFILE_EMPLOYEE');
        $role->givePermissionTo('CREATE_REVISION');
        $role->givePermissionTo('UPDATE_REVISION');
        $role->givePermissionTo('PROPOSAL_APPROVAL_BAS');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'KETUA_INSTITUSI']);
        $role->givePermissionTo('UPDATE_PROFILE_ANGGOTA');
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('CREATE_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'ANGGOTA_INSTITUSI']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');

        $role = Role::create(['name' => 'PANITIA_INSTITUSI']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('PANITIA_UPDATE_PROPOSAL');
        $role->givePermissionTo('PANITIA_VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_PROPOSAL');
        $role->givePermissionTo('VIEW_REVISION');
        
        $role = Role::create(['name' => 'GUEST']);
        $role->givePermissionTo('UPDATE_PROFILE_STUDENT');
        $role->givePermissionTo('NO_ACCESS');
    }
}
