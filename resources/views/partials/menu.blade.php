{{-- Notif Logic --}}
@php
    $cekRoles = trim(Auth::user()->getRoleNames(), '[]"');
@endphp
{{-- End Notif Logic --}}
<!-- MENU -->
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.home') }}" target="_blank">
            <img src="{{ asset('material/assets/img/logo-lpkia.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">e-Proposal</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('admin.home') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @can('UPDATE_PROFILE_STUDENT')
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('admin/update_profile') || request()->is('admin/update_profile/*') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('admin.update.profile') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-card-heading"></i>
                        </div>
                        <span class="nav-link-text ms-1">Update Profile Student</span>
                    </a>
                </li>
            @endcannot

            @can('MANAGE_MASTER_DATA')
                <li class="nav-item mt-3" data-bs-toggle="collapse" data-bs-target="#master">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Master <i
                            class="bi bi-caret-right-fill"></i></h6>
                </li>
                <div id="master">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/committee-roles') || request()->is('admin/committee-roles/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.committee-roles.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-tag-fill"></i>
                            </div>
                            <span class="nav-link-text ms-1">Committee Roles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/employees') || request()->is('admin/employees/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.employees.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Employees</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/events') || request()->is('admin/events/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.events.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar2-event"></i>
                            </div>
                            <span class="nav-link-text ms-1">Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/organizations') || request()->is('admin/organizations/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.organizations.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-diagram-2-fill"></i>
                            </div>
                            <span class="nav-link-text ms-1">Organization</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/participant_type') || request()->is('admin/participant_type/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.participant_type.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-alarm-fill"></i>
                            </div>
                            <span class="nav-link-text ms-1">Participant Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/places') || request()->is('admin/places/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.places.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-pin-map-fill"></i>
                            </div>
                            <span class="nav-link-text ms-1">Places</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/students') || request()->is('admin/students/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.students.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <span class="nav-link-text ms-1">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/type_anggaran') || request()->is('admin/type_anggaran/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.type_anggaran.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-coin"></i>
                            </div>
                            <span class="nav-link-text ms-1">Type Anggaran</span>
                        </a>
                    </li>
                </div>
            @endcan
            @hasanyrole('ADMIN|KETUA_HIMATIK|KETUA_HIMAADBIS|KETUA_HIMAKOMPAK|KETUA_UKM|KETUA_KSM|KETUA_BEM|KETUA_BPM')
                <li class="nav-item mt-3" data-bs-toggle="collapse" data-bs-target="#organisasi">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Organisasi <i
                            class="bi bi-caret-right-fill"></i></h6>
                </li>
                <div id="organisasi">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/student/member') || request()->is('admin/student/member/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.student.member') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <span class="nav-link-text ms-1">Hak Akses Anggota</span>
                        </a>
                    </li>
                </div>
            @endhasanyrole

            <li class="nav-item mt-3" data-bs-toggle="collapse" data-bs-target="#proposal">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Proposal <i
                        class="bi bi-caret-right-fill"></i></h6>
            </li>

            <div id="proposal">
                @hasanyrole('PEMBINA|KAPRODI|REKTOR|BAS|ADMIN')
                    <li class="nav-item">

                        <a class="nav-link text-white {{ request()->is('admin/proposal/cek') || request()->is('admin/proposal/cek') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.cek.proposal') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-search-heart"></i>
                            </div>
                            {{-- Notification --}}
                            <span class="nav-link-text ms-1">Cek Pengajuan
                                @if ($cekRoles == 'KAPRODI' || 'PEMBINA')
                                    @php
                                        $cekPengajuan = \App\Models\Proposal::where('isFinished', 0)
                                            ->whereHas('approval', function ($query) {
                                                $query
                                                    ->where('approved', 1)
                                                    ->where('name', 'KETUA HIMA')
                                                    ->orWhere('name', 'KETUA BPM');
                                            })
                                            ->count();
                                    @endphp
                                @elseif ($cekRoles == 'REKTOR')
                                    @php
                                        $cekPengajuan = \App\Models\Proposal::where('isFinished', 0)
                                            ->whereHas('approval', function ($query) {
                                                $query
                                                    ->where('approved', 1)
                                                    ->where('name', 'KETUA PRODI')
                                                    ->orWhere('name', 'PEMBINA');
                                            })
                                            ->count();
                                    @endphp
                                @elseif ($cekRoles == 'BAS')
                                    @php
                                        $cekPengajuan = \App\Models\Proposal::where('isFinished', 0)
                                            ->whereHas('approval', function ($query) {
                                                $query->where('approved', 1)->where('level', 'REKTOR');
                                            })
                                            ->count();
                                    @endphp
                                @else
                                    @php
                                        $cekPengajuan = \App\Models\Proposal::where('isFinished', 0)->count();
                                    @endphp
                                @endif

                                <span class="badge bg-info text-white">{{ $cekPengajuan }}</span>
                            </span>
                            {{-- End of Notification --}}
                        </a>
                    </li>
                @endhasanyrole
                @hasanyrole('KETUA_HIMATIK|PANITIA_HIMATIK|ANGGOTA_HIMATIK|KETUA_HIMAADBIS|PANITIA_HIMAADBIS|ANGGOTA_HIMAADBIS|KETUA_HIMAKOMPAK|PANITIA_HIMAKOMPAK|ANGGOTA_HIMAKOMPAK|KETUA_UKM|PANITIA_UKM|ANGGOTA_UKM|KETUA_KSM|PANITIA_KSM|ANGGOTA_KSM|KETUA_BEM|PANITIA_BEM|ANGGOTA_BEM|KETUA_BPM|PANITIA_BPM|ANGGOTA_BPM')
                    <li class="nav-item">

                        <a class="nav-link text-white {{ request()->is('admin/proposals') || request()->is('admin/proposals/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.proposals.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-send-fill"></i>
                            </div>

                            <span class="nav-link-text ms-1">Pengajuan</span>
                        </a>
                    </li>
                @endhasanyrole
                @hasanyrole('KETUA_BPM|KETUA_BEM|KETUA_HIMAADBIS|KETUA_HIMAKOMPAK|KETUA_HIMATIK|ADMIN|BAS|REKTOR|PEMBINA|KAPRODI')
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/lpjs') || request()->is('admin/lpjs/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.lpjs.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-book"></i>
                            </div>
                            <span class="nav-link-text ms-1">LPJ Masuk</span>
                        </a>
                    </li>
                @endhasanyrole

                @hasanyrole('ADMIN|BAS|REKTOR|PEMBINA')
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/proposal/report') || request()->is('admin/proposals/report/*') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.proposals.report') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-check"></i>
                            </div>
                            <span class="nav-link-text ms-1">Report Proposal disetujui</span>
                        </a>
                    </li>
                @endhasanyrole
                @can('MANAGE_MASTER_DATA')
                    <li class="nav-item mt-3" data-bs-toggle="collapse" data-bs-target="#user">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">User
                            Management <i class="bi bi-caret-right-fill"></i>
                        </h6>
                    </li>
                    <div id="user">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->is('admin/student/member') || request()->is('admin/student/member/*') ? 'active bg-gradient-primary' : '' }}"
                                href="{{ route('admin.student.member') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people-fill"></i>
                                </div>

                                <span class="nav-link-text ms-1">Set Ketua Default</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active bg-gradient-primary' : '' }}"
                                href="{{ route('admin.permissions.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <span class="nav-link-text ms-1">Permissions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active bg-gradient-primary' : '' }}"
                                href="{{ route('admin.roles.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-bounding-box"></i>
                                </div>
                                <span class="nav-link-text ms-1">Roles</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active bg-gradient-primary' : '' }}"
                                href="{{ route('admin.users.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <span class="nav-link-text ms-1">Users</span>
                            </a>
                        </li>
                    </div>
                @endcan
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('change_password') || request()->is('change_password/*') ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('auth.change_password') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-key-fill"></i>
                        </div>
                        <span class="nav-link-text ms-1">Change Password</span>
                    </a>
                </li>
            </div>



        </ul>
    </div>
</aside>
<!-- MENU -->
