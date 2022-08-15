 <!-- Navbar -->
 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
     navbar-scroll="true">
     <div class="container-fluid py-1 px-3">
         <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
             <div class="ms-md-auto pe-md-3 d-flex align-items-center">

             </div>
             <ul class="navbar-nav  justify-content-end">
                 <li class="nav-item d-flex align-items-center">
                     <a href="#" class="nav-link text-body font-weight-bold px-0">
                         <i class="fa fa-user me-sm-1"></i>
                         <span class="d-sm-inline d-none">{{ Auth::user()->name }} | </span>
                     </a>
                 </li>
                 <li>&nbsp;</li>
                 <li class="nav-item d-flex align-items-center">
                     <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0">
                         <span class="d-sm-inline d-none"> Logout</span>
                     </a>
                 </li>
                 <li>&nbsp;</li>
                 <li class="nav-item dropdown pe-2 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="fa fa-bell faa-ring animated"></i>
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                         aria-labelledby="dropdownMenuButton">
                         @php
                             $idUser = Auth::user()->id;
                             
                             $arrayGeneral = App\Models\Approval::Select('name', 'approved', 'level', 'updated_at', 'user_id', 'proposal_id', 'date')
                                 ->where('approved', 1)
                                 ->where('user_id', $idUser)
                                 ->orderBy('updated_at', 'DESC')
                                 ->paginate(5);
                             
                             $arrayRektor = App\Models\Proposal::whereHas('approval', function ($query) {
                                 $query
                                     ->where('approved', 1)
                                     ->where('name', 'KETUA PRODI')
                                     ->orWhere('approved', 1)
                                     ->where('name', 'PEMBINA MHS');
                             })
                                 ->orderBy('updated_at', 'DESC')
                                 ->paginate(5);
                         @endphp

                         @hasrole('REKTOR')
                             @forelse($arrayRektor as $element)
                                 <li class="mb-2">
                                     <a class="dropdown-item border-radius-md" href="{{ route('admin.proposals.show',$element->id) }}">
                                         <div class="d-flex py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="text-sm font-weight-normal mb-1">
                                                     <span class="font-weight-bold">Proposal: {{ $element->name }} </span>
                                                 </h6>
                                                 @foreach ($element->approval as $app)
                                                     @if ($app->approved == 0)
                                                         <span class="badge bg-danger"
                                                             style="color: white; margin-top:5px; margin-bottom:5px">{{ $app->name }}
                                                             <i class="fa fa-times faa-pulse animated"></i></span>
                                                     @else
                                                         <span class="badge bg-success"
                                                             style="color: white; margin-top:5px; margin-bottom:5px">{{ $app->name }}
                                                             <i class="fa fa-check faa-pulse animated"></i></span>
                                                     @endif
                                                 @endforeach

                                                 <p class="text-xs text-black mb-0">
                                                     <i class="fa fa-clock me-1">
                                                         {{ substr($element->updated_at, 0, 16) }}</i>

                                                 </p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                                 <hr>
                             @empty
                                 <li class="mb-2">
                                     <a class="dropdown-item border-radius-md" href="javascript:;">
                                         <div class="d-flex py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="text-sm font-weight-normal mb-1">
                                                     <span class="font-weight-bold">Belum ada notifikasi</span>
                                                 </h6>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                             @endforelse
                         @else
                             @forelse($arrayGeneral as $element)
                                 <li class="mb-2">
                                     <a class="dropdown-item border-radius-md" href="{{ route('admin.proposals.show',$element->proposal_id) }}">
                                         <div class="d-flex py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="text-sm font-weight-normal mb-1">
                                                     <span class="font-weight-bold">Proposal: {{ $element->proposal->name }}
                                                     </span>
                                                 </h6>
                                                 <p>Sudah disetujui <span
                                                         class="badge bg-success text-white">{{ $element->name }}</span></p>

                                                 <p class="text-xs text-black mb-0">
                                                     <i class="fa fa-clock me-1">
                                                         {{ substr($element->updated_at, 0, 16) }}</i>

                                                 </p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                                 <hr>
                             @empty
                                 <li class="mb-2">
                                     <a class="dropdown-item border-radius-md" href="javascript:;">
                                         <div class="d-flex py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="text-sm font-weight-normal mb-1">
                                                     <span class="font-weight-bold">Belum ada notifikasi</span>
                                                 </h6>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                             @endforelse
                         @endhasrole
                     </ul>
                 </li>
                 <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                         <div class="sidenav-toggler-inner">
                             <i class="sidenav-toggler-line"></i>
                             <i class="sidenav-toggler-line"></i>
                             <i class="sidenav-toggler-line"></i>
                         </div>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- End Navbar -->
