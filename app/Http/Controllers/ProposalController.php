<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Place;
use App\Models\Event;
use App\Models\Student;
use App\Models\ParticipantType;
use App\Models\Approval;
use App\Models\BudgetExpenditure;
use App\Models\BudgetReceipt;
use App\Models\Committee;
use App\Models\Participant;
use App\Models\PlanningSchedule;
use App\Models\Revision;
use App\Models\Schedule;
use App\Models\Organization;
use App\Models\TypeAnggaran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\Empty_;

/**
 * Class ProposalController
 * @package App\Http\Controllers
 */
class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Check Roles Login
        if (Auth::user()->hasRole('ADMIN')) {
            $proposals = Proposal::orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('KETUA_HIMATIK') || Auth::user()->hasRole('ANGGOTA_HIMATIK') || Auth::user()->hasRole('PANITIA_HIMATIK')) {
            $proposals = Proposal::where('org_name', 'HIMATIK')
                ->orWhere('owner', 'KSM')
                ->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'HIMA')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('singkatan', 'HIMATIK')->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 1);
            })->get();
        } elseif (Auth::user()->hasRole('PEMBINA')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA HIMA")
                    ->orWhere('approved', 1)
                    ->where('name', "KETUA BPM");
            })->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('KAPRODI')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "PEMBINA HIMA");
            })->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('REKTOR')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA PRODI")
                    ->orWhere('approved', 1)
                    ->where('name', "PEMBINA MHS");
            })->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('BAS')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)->where('name', "REKTOR");
            })->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK') || Auth::user()->hasRole('ANGGOTA_HIMAKOMPAK') || Auth::user()->hasRole('PANITIA_HIMAKOMPAK')) {
            $proposals = Proposal::where('org_name', 'HIMAKOMPAK')
                ->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'HIMA')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('singkatan', 'HIMAKOMPAK')->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 2);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS') || Auth::user()->hasRole('ANGGOTA_HIMAADBIS') || Auth::user()->hasRole('PANITIA_HIMAADBIS')) {
            $proposals = Proposal::where('org_name', 'HIMAADBIS')
                ->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'HIMA')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('singkatan', 'HIMAADBIS')->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 3);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_BEM') || Auth::user()->hasRole('ANGGOTA_BEM') || Auth::user()->hasRole('PANITIA_BEM')) {
            $proposals = Proposal::where('org_name', 'BEM')
                ->orWhere('owner', 'UKM')
                ->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'BEM')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('singkatan', 'BEM')->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 4);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_BPM') || Auth::user()->hasRole('ANGGOTA_BPM') || Auth::user()->hasRole('PANITIA_BPM')) {
            $proposals = Proposal::where('org_name', 'BPM')
                ->orWhereHas('approval', function ($query) {
                    $query->where('approved', 1)
                        ->where('name', "KETUA BEM");
                })->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'BPM')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('singkatan', 'BPM')->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 5);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_UKM') || Auth::user()->hasRole('ANGGOTA_UKM') || Auth::user()->hasRole('PANITIA_UKM')) {
            $proposals = Proposal::where('owner', 'UKM')
                ->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'UKM')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('type', 'UKM')->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('KETUA_KSM') || Auth::user()->hasRole('ANGGOTA_KSM') || Auth::user()->hasRole('PANITIA_KSM')) {
            $proposals = Proposal::where('owner', 'KSM')
                ->orderBy('created_at', 'DESC')
                ->paginate();

            $organization = Organization::where('type', 'KSM')->orderBy('singkatan', 'ASC')->pluck('id', 'type');
            $organization_name = Organization::where('type', 'KSM')
                ->orderBy('name', 'ASC')->pluck('id', 'singkatan');
            $student = Student::select('user_id', 'nim')->get();
        }
        //End of Check Roles Login

        $approval = Approval::orderBy('created_at', 'DESC')->get();
        $place = Place::pluck('id', 'name');
        $event = Event::pluck('id', 'name');

        return view('proposal.index', compact('proposals', 'organization_name', 'approval', 'place', 'event', 'student', 'organization'))
            ->with('i', (request()->input('page', 1) - 1) * $proposals->perPage());
    }

    public function search(Request $request)
    {
        $cari = $request->search;
        //Check Roles Login
        if (Auth::user()->hasRole('ADMIN')) {
            $proposals = Proposal::where('name', 'like', "%" . $cari . "%")->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMATIK') || Auth::user()->hasRole('ANGGOTA_HIMATIK')) {
            $proposals = Proposal::where('name', 'like', "%" . $cari . "%")->where('org_name', 'HIMATIK')
                ->orWhere('owner', 'KSM')
                ->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('PEMBINA')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA HIMA")
                    ->orWhere('approved', 1)
                    ->where('name', "KETUA BPM");
            })->where('name', 'like', "%" . $cari . "%")->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KAPRODI')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "PEMBINA HIMA");
            })->where('name', 'like', "%" . $cari . "%")->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('REKTOR')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA PRODI")
                    ->orWhere('approved', 1)
                    ->where('name', "PEMBINA MHS");
            })->where('name', 'like', "%" . $cari . "%")->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('BAS')) {
            $proposals = Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)->where('name', "REKTOR");
            })->where('name', 'like', "%" . $cari . "%")->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK') || Auth::user()->hasRole('ANGGOTA_HIMAKOMPAK')) {
            $proposals = Proposal::where('org_name', 'HIMAKOMPAK')
                ->where('name', 'like', "%" . $cari . "%")
                ->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS') || Auth::user()->hasRole('ANGGOTA_HIMAADBIS')) {
            $proposals = Proposal::where('org_name', 'HIMAADBIS')
                ->where('name', 'like', "%" . $cari . "%")
                ->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_BEM') || Auth::user()->hasRole('ANGGOTA_BEM')) {
            $proposals = Proposal::where('org_name', 'BEM')
                ->orWhere('owner', 'UKM')
                ->where('name', 'like', "%" . $cari . "%")
                ->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_BPM') || Auth::user()->hasRole('ANGGOTA_BPM')) {
            $proposals = Proposal::where('org_name', 'BPM')
                ->orWhereHas('approval', function ($query) {
                    $query->where('approved', 1)
                        ->where('name', "KETUA BEM");
                })->where('name', 'like', "%" . $cari . "%")->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_UKM') || Auth::user()->hasRole('ANGGOTA_UKM')) {
            $proposals = Proposal::where('owner', 'UKM')
                ->where('name', 'like', "%" . $cari . "%")
                ->orderBy('created_at', 'DESC')
                ->paginate();
        } elseif (Auth::user()->hasRole('KETUA_KSM') || Auth::user()->hasRole('ANGGOTA_KSM')) {
            $proposals = Proposal::where('owner', 'KSM')
                ->where('name', 'like', "%" . $cari . "%")
                ->orderBy('created_at', 'DESC')
                ->paginate();
        }
        //End of Check Roles Login

        $approval = Approval::orderBy('created_at', 'DESC')->get();
        $place = Place::pluck('id', 'name');
        $event = Event::pluck('id', 'name');
        $organization = Organization::orderBy('singkatan', 'ASC')->pluck('id', 'type');
        $organization_name = Organization::orderBy('name', 'ASC')->pluck('id', 'singkatan');
        $student = Student::with('user')->get()->pluck('user.name', 'user_id');

        return view('proposal.index', compact('proposals', 'organization_name', 'approval', 'place', 'event', 'student', 'organization'))
            ->with('i', (request()->input('page', 1) - 1) * $proposals->perPage());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proposal = new Proposal();
        $place = Place::pluck('id', 'name');
        $event = Event::pluck('id', 'name');
        $participantType = ParticipantType::pluck('id', 'name');
        $user = Student::with('user')->get()->pluck('user.name', 'user_id');
        $student = Committee::where('proposal_id')->get();
        return view('proposal.create', compact('proposal', 'place', 'event', 'user', 'student', 'participantType'));
    }
    public function finalize($id)
    {
        $proposal = Proposal::find($id);
        $place = Place::pluck('id', 'name');
        $event = Event::pluck('id', 'name');
        $participantType = ParticipantType::pluck('id', 'name');
        $user = Student::with('user')->get()->pluck('user.name', 'user_id');
        $student = Committee::where('proposal_id', $id)->get();
        $committee = Committee::where('proposal_id', $id)->get();
        $panitiaCount = $committee->count();

        $budget_receipt = BudgetReceipt::where('proposal_id', $id)->get();
        $budget_expenditure = BudgetExpenditure::where('proposal_id', $id)->get();
        $planning_schedule = PlanningSchedule::where('proposal_id', $id)->get();
        $schedule = Schedule::where('proposal_id', $id)->get();
        $participants = Participant::where('proposal_id', $id)->get();

        return view('proposal.create', compact(
            'proposal',
            'panitiaCount',
            'committee',
            'place',
            'event',
            'user',
            'student',
            'participantType',
            'budget_receipt'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getName = Auth::user()->id;
        $data = $request->all();
        // request()->validate(Committee::$rules);
        // request()->validate(BudgetReceipt::$rules);
        // request()->validate(BudgetExpenditure::$rules);

        //Tab Penerimaan Anggaran
        $penerimaan_name = $data["penerimaan_name"];
        $penerimaan_qty = $data["penerimaan_qty"];
        $penerimaan_price = $data["penerimaan_price"];

        //Tab Pengeluaran Anggaran
        $pengeluaran_name = $data["pengeluaran_name"];
        $pengeluaran_qty = $data["pengeluaran_qty"];
        $pengeluaran_price = $data["pengeluaran_price"];

        //Tab Jadwal Perencanaan
        $jadwal_kegiatan = $data["jadwal_kegiatan"];
        $jadwal_userID = $data["jadwal_user_id"];
        $jadwal_date = $data["jadwal_date"];
        $jadwal_notes = $data["jadwal_notes"];

        //Tab Susunan Acara
        $susunan_kegiatan = $data["susunan_kegiatan"];
        $susunan_userID = $data["susunan_user_id"];
        $susunan_time = $data["susunan_time"];
        $susunan_notes = $data["susunan_notes"];

        //Tab Peserta
        $peserta_participant_type_id = $data["peserta_participant_type_id"];
        $peserta_participant_total = $data["peserta_participant_total"];
        $proposal_id = $request->proposal_id;

        if ($penerimaan_name) {
            foreach ($penerimaan_name  as $key => $value) {
                $penerimaan = new BudgetReceipt();
                $penerimaan->proposal_id = $proposal_id;
                $penerimaan->name = $penerimaan_name[$key];
                $penerimaan->qty = $penerimaan_qty[$key];
                $penerimaan->price = $penerimaan_price[$key];
                $penerimaan->total = $penerimaan_price[$key] * $penerimaan_qty[$key];
                $penerimaan->save();
            }
        }
        if ($pengeluaran_name) {
            foreach ($pengeluaran_name  as $key => $value) {
                $pengeluaran = new BudgetExpenditure();
                $pengeluaran->proposal_id = $proposal_id;
                $pengeluaran->name = $pengeluaran_name[$key];
                $pengeluaran->qty = $pengeluaran_qty[$key];
                $pengeluaran->price = $pengeluaran_price[$key];
                $pengeluaran->total = $pengeluaran_price[$key] * $pengeluaran_qty[$key];
                $pengeluaran->save();
            }
        }
        if ($jadwal_userID) {
            foreach ($jadwal_userID  as $key => $value) {
                $jadwal = new PlanningSchedule();
                $jadwal->proposal_id = $proposal_id;
                $jadwal->user_id = $jadwal_userID[$key];
                $jadwal->kegiatan = $jadwal_kegiatan[$key];
                $jadwal->notes = $jadwal_notes[$key];
                $jadwal->date = $jadwal_date[$key];
                $jadwal->save();
            }
        }
        if ($susunan_userID) {
            foreach ($susunan_userID  as $key => $value) {
                $susunan = new Schedule();
                $susunan->proposal_id = $proposal_id;
                $susunan->user_id = $susunan_userID[$key];
                $susunan->kegiatan = $susunan_kegiatan[$key];
                $susunan->notes = $susunan_notes[$key];
                $susunan->times = $susunan_time[$key];
                $susunan->save();
            }
        }
        if ($peserta_participant_type_id) {
            foreach ($peserta_participant_type_id  as $key => $value) {
                $peserta = new Participant();
                $peserta->proposal_id = $proposal_id;
                $peserta->participant_type_id = $peserta_participant_type_id[$key];
                $peserta->participant_total = $peserta_participant_total[$key];
                $peserta->save();
            }
        }

        return redirect()->route('admin.proposals.finalize', $proposal_id)
            ->with('success', 'Proposal created successfully.');
    }

    public function store_proposal(Request $request)
    {
        $getId = Auth::user()->id;
        $getName = Auth::user()->id;
        $data = $request->all();
        $date = date('d/m/Y');
        $timestamp = now();

        request()->validate(Proposal::$rules);

        $proposal = Proposal::create([
            'name' => $request->name,
            'latar_belakang' => $request->latar_belakang,
            'tema_kegiatan' => $request->tema_kegiatan,
            'tujuan_kegiatan' => $request->tujuan_kegiatan,
            'id_tempat' => $request->id_tempat,
            'tanggal' => $request->tanggal,
            'tanggal_selesai' => $request->tanggal,
            'id_kegiatan' => $request->id_kegiatan,
            'owner' => $request->owner,
            'org_name' => $request->org_name,
            'created_by' => $getName,
            'updated_by' => $getId
        ]);

        //Tab Kepanitiaan
        $panitia = $data["kepanitiaan_user_id"];
        $peran = $data["kepanitiaan_position"];

        if ($panitia) {
            foreach ($panitia  as $key => $value) {
                $kepanitiaan = new Committee();
                $kepanitiaan->proposal_id = $proposal["id"];
                $kepanitiaan->user_id = $panitia[$key];
                $kepanitiaan->position = $peran[$key];
                $kepanitiaan->save();
            }
        }

        switch ($proposal["owner"]) {
            case ("HIMA"):
                $data = array(
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA HIMA',
                        'approved' => 0,
                        'level' => 1,
                        'date' => $date,
                        'created_at' => $timestamp,
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'PEMBINA HIMA',
                        'approved' => 0,
                        'level' => 2,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA PRODI',
                        'approved' => 0,
                        'level' => 3,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'REKTOR',
                        'approved' => 0,
                        'level' => 4,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'BAS',
                        'approved' => 0,
                        'level' => 5,
                        'date' => $date,
                        'created_at' => $timestamp
                    )

                );
                break;
            case ("KSM"):
                $data = array(
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA HIMA',
                        'approved' => 0,
                        'level' => 1,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'PEMBINA HIMA',
                        'approved' => 0,
                        'level' => 2,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA PRODI',
                        'approved' => 0,
                        'level' => 3,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'REKTOR',
                        'approved' => 0,
                        'level' => 4,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'BAS',
                        'approved' => 0,
                        'level' => 5,
                        'date' => $date,
                        'created_at' => $timestamp
                    )

                );
                break;
            case ("BEM"):
                $data = array(
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA BEM',
                        'approved' => 0,
                        'level' => 1,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA BPM',
                        'approved' => 0,
                        'level' => 2,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'PEMBINA MHS',
                        'approved' => 0,
                        'level' => 3,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'REKTOR',
                        'approved' => 0,
                        'level' => 4,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'BAS',
                        'approved' => 0,
                        'level' => 5,
                        'date' => $date,
                        'created_at' => $timestamp
                    )

                );
                break;
            case ("UKM"):
                $data = array(
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA BEM',
                        'approved' => 0,
                        'level' => 1,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA BPM',
                        'approved' => 0,
                        'level' => 2,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'PEMBINA MHS',
                        'approved' => 0,
                        'level' => 3,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'REKTOR',
                        'approved' => 0,
                        'level' => 4,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'BAS',
                        'approved' => 0,
                        'level' => 5,
                        'date' => $date,
                        'created_at' => $timestamp
                    )

                );
                break;
            case ("BPM"):
                $data = array(
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'KETUA BPM',
                        'approved' => 0,
                        'level' => 1,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'PEMBINA MHS',
                        'approved' => 0,
                        'level' => 2,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'REKTOR',
                        'approved' => 0,
                        'level' => 3,
                        'date' => $date,
                        'created_at' => $timestamp
                    ),
                    array(
                        'proposal_id' => $proposal->id,
                        'user_id' => $getId,
                        'name' => 'BAS',
                        'approved' => 0,
                        'level' => 4,
                        'date' => $date,
                        'created_at' => $timestamp
                    )

                );
                break;
        }

        Approval::insert($data);

        toastr()->success('Proposal created successfully.');
        return redirect()->route('admin.proposals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        // $cekUser = Auth::user()->id;
        // $cekPanitia = Committee::select('user_id', 'proposal_id')->where('user_id', $cekUser)->where('proposal_id', $id)->first();
        // if ($cekPanitia === null) {
        //     return abort(401);
        // }
        $proposal = Proposal::find($id);
        $approved = Approval::where('proposal_id', $id)->where('approved', 1)->get();
        //Check Approval
        $getApproval2 = Approval::select('level', 'approved')
            ->where('proposal_id', $id)
            ->where('level', 2)
            ->where('approved', 1)
            ->first();
        $getApproval3 = Approval::select('level', 'approved')
            ->where('proposal_id', $id)
            ->where('level', 3)
            ->where('approved', 1)
            ->first();
        $getApproval4 = Approval::select('level', 'approved')
            ->where('proposal_id', $id)
            ->where('level', 4)
            ->where('approved', 1)
            ->first();
        $getApproval5 = Approval::select('level', 'approved')
            ->where('proposal_id', $id)
            ->where('level', 5)
            ->where('approved', 1)
            ->first();
        //End of Check Approval

        //Get proposal ID
        $committee = Committee::where('proposal_id', $id)->get();
        $budget_receipt = BudgetReceipt::where('proposal_id', $id)->get();
        $budget_expenditure = BudgetExpenditure::where('proposal_id', $id)->get();
        $planning_schedule = PlanningSchedule::where('proposal_id', $id)->get();
        $schedule = Schedule::where('proposal_id', $id)->get();
        $participants = Participant::where('proposal_id', $id)->get();
        $revisions = Revision::where('proposal_id', $id)->get();
        $approvals = Approval::where('proposal_id', $id)->orderBy('level', 'ASC')->get();
        //Sum
        $sum_budget_receipt = BudgetReceipt::where('proposal_id', $id)->sum('total');
        $sum_budget_expenditure = BudgetExpenditure::where('proposal_id', $id)->sum('total');
        $sum_participants = Participant::where('proposal_id', $id)->sum('participant_total');
        $panitiaCount = $committee->count();

        return view(
            'proposal.show',
            compact(
                'approved',
                'proposal',
                'getApproval2',
                'getApproval3',
                'getApproval4',
                'getApproval5',
                'committee',
                'budget_receipt',
                'budget_expenditure',
                'revisions',
                'approvals',
                'sum_budget_receipt',
                'sum_budget_expenditure',
                'planning_schedule',
                'schedule',
                'participants',
                'sum_participants',
                'panitiaCount'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $cekUser = Auth::user()->id;

        $cekPanitia = Committee::select('user_id', 'proposal_id')->where('user_id', $cekUser)->where('proposal_id', $id)->first();
        if ($cekPanitia === null) {
            return abort(401);
        }

        $place = Place::pluck('id', 'name');
        $event = Event::pluck('id', 'name');
        $participantType = ParticipantType::pluck('id', 'name');
        $type_anggaran = TypeAnggaran::orderBy('name', 'ASC')->pluck('id', 'name');
        $student = Committee::where('proposal_id', $id)->get();
        if (Auth::user()->hasRole('ADMIN')) {
            $user = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('KETUA_HIMATIK') || Auth::user()->hasRole('PANITIA_HIMATIK')) {
            $user = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 1);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK') || Auth::user()->hasRole('PANITIA_HIMAKOMPAK')) {
            $user = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 2);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS') || Auth::user()->hasRole('PANITIA_HIMAADBIS')) {
            $user = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 3);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_BEM') || Auth::user()->hasRole('PANITIA_BEM')) {
            $user = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 4);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_BPM') || Auth::user()->hasRole('PANITIA_BPM')) {
            $user = Student::whereHas('organization', function ($query) {
                $query->where('organization_id', 5);
            })->get();
        } elseif (Auth::user()->hasRole('KETUA_KSM') || Auth::user()->hasRole('PANITIA_KSM')) {
            $user = Student::select('user_id', 'nim')->get();
        } elseif (Auth::user()->hasRole('KETUA_UKM') || Auth::user()->hasRole('PANITIA_UKM')) {
            $user = Student::select('user_id', 'nim')->get();
        }

        $organization = Organization::pluck('id', 'type');

        $proposal = Proposal::find($id);

        //Get proposal ID
        $committee = Committee::where('proposal_id', $id)->get();
        $budget_receipt = BudgetReceipt::where('proposal_id', $id)->get();
        $budget_expenditure = BudgetExpenditure::where('proposal_id', $id)->get();
        $planning_schedule = PlanningSchedule::where('proposal_id', $id)->get();
        $schedule = Schedule::where('proposal_id', $id)->get();
        $participants = Participant::where('proposal_id', $id)->get();
        $isKetua = Committee::select('position')->where('proposal_id', $id)->where('user_id', $cekUser)->first();


        //Sum
        $sum_budget_receipt = BudgetReceipt::where('proposal_id', $id)->sum('total');
        $sum_budget_expenditure = BudgetExpenditure::where('proposal_id', $id)->sum('total');
        $sum_participants = Participant::where('proposal_id', $id)->sum('participant_total');
        $panitiaCount = $committee->count();

        return view('proposal.edit', compact(
            'proposal',
            'place',
            'event',
            'student',
            'user',
            'organization',
            'participantType',
            'type_anggaran',
            'committee',
            'budget_receipt',
            'budget_expenditure',
            'sum_budget_receipt',
            'sum_budget_expenditure',
            'planning_schedule',
            'schedule',
            'participants',
            'isKetua',
            'sum_participants',
            'panitiaCount'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proposal $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        request()->validate(Proposal::$rules);
        $proposal->update($request->all());

        toastr()->success('Proposal berhasil diupdate');
        return redirect()->route('admin.proposals.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $proposal = Proposal::find($id)->delete();

        toastr()->success('Proposal berhasil dihapus');
        return redirect()->route('admin.proposals.index');
    }

    public function destroy_committee(Request $request, $id)
    {
        $committee = Committee::find($id)->delete();
        $proposal_id            = $request->proposal_id;

        toastr()->success('Kepanitiaan di Proposal berhasil dihapus.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function update_committee(Request $request, $id)
    {
        $user_id                = $request->user_id;
        $position               = $request->position;
        $proposal_id            = $request->proposal_id;

        $committee              = Committee::find($id);
        $committee->user_id     = ($user_id);
        $committee->position    = ($position);
        $committee->update();

        toastr()->success('Kepanitiaan di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_committee(Request $request)
    {
        $user_id                = $request->user_id;
        $position               = $request->position;
        $proposal_id            = $request->proposal_id;
        $proposal_id            = Crypt::decrypt($proposal_id);

        $committee              = new Committee();
        $committee->proposal_id = ($proposal_id);
        $committee->user_id     = ($user_id);
        $committee->position    = ($position);
        $committee->save();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Kepanitiaan di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_budget_receipt(Request $request)
    {
        $data           = $request->all();
        $proposal_id    = $request->proposal_id;
        $user_id        = Auth::user()->id;
        //Tab Penerimaan Anggaran
        $penerimaan_name = $data["penerimaan_name"];
        $penerimaan_type_anggaran = $data["penerimaan_type_anggaran_id"];
        $penerimaan_qty = $data["penerimaan_qty"];
        $penerimaan_price = $data["penerimaan_price"];
        $proposal_id = Crypt::decrypt($proposal_id);

        if ($penerimaan_name) {
            foreach ($penerimaan_name  as $key => $value) {
                $penerimaan = new BudgetReceipt();
                $penerimaan->proposal_id = $proposal_id;
                $penerimaan->name = $penerimaan_name[$key];
                $penerimaan->type_anggaran_id = $penerimaan_type_anggaran[$key];
                $penerimaan->qty = $penerimaan_qty[$key];
                $penerimaan->price = $penerimaan_price[$key];
                $penerimaan->total = $penerimaan_price[$key] * $penerimaan_qty[$key];
                $penerimaan->save();
            }
        }

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id = Crypt::encrypt($proposal_id);
        toastr()->success('Penerimaan Anggaran di Proposal berhasil ditambahkan.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function update_budgetreceipt(Request $request, $id)
    {
        $name           = $request->name;
        $type_anggaran  = $request->type_anggaran_id;
        $qty            = $request->qty;
        $price          = $request->price;
        $total          = $request->price * $request->qty;
        $proposal_id    = $request->proposal_id;
        $user_id        = Auth::user()->id;

        $proposal_id            = Crypt::decrypt($proposal_id);

        $budget_receipt              = BudgetReceipt::find($id);
        $budget_receipt->proposal_id    = ($proposal_id);
        $budget_receipt->name           = ($name);
        $budget_receipt->type_anggaran_id = ($type_anggaran);
        $budget_receipt->qty            = ($qty);
        $budget_receipt->price          = ($price);
        $budget_receipt->total          = ($total);
        $budget_receipt->update();

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Penerimaan Anggaran di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function destroy_budgetreceipt(Request $request, $id)
    {
        $budgetreceipt          = BudgetReceipt::find($id)->delete();
        $proposal_id            = $request->proposal_id;

        toastr()->success('Penerimaan Anggaran di Proposal berhasil dihapus.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_budget_expenditure(Request $request)
    {
        $data = $request->all();
        $proposal_id = $request->proposal_id;
        $user_id = Auth::user()->id;
        //Tab Pengeluaran Anggaran
        $pengeluaran_name = $data["pengeluaran_name"];
        $pengeluaran_type_anggaran = $data["pengeluaran_type_anggaran_id"];
        $pengeluaran_qty = $data["pengeluaran_qty"];
        $pengeluaran_price = $data["pengeluaran_price"];
        $proposal_id            = Crypt::decrypt($proposal_id);

        if ($pengeluaran_name) {
            foreach ($pengeluaran_name  as $key => $value) {
                $pengeluaran = new BudgetExpenditure();
                $pengeluaran->proposal_id = $proposal_id;
                $pengeluaran->name = $pengeluaran_name[$key];
                $pengeluaran->type_anggaran_id = $pengeluaran_type_anggaran[$key];
                $pengeluaran->qty = $pengeluaran_qty[$key];
                $pengeluaran->price = $pengeluaran_price[$key];
                $pengeluaran->total = $pengeluaran_price[$key] * $pengeluaran_qty[$key];
                $pengeluaran->save();
            }
        }

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();
        $proposal_id            = Crypt::encrypt($proposal_id);

        toastr()->success('Pengeluaran Anggaran di Proposal berhasil ditambahkan.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function update_budgetexpenditure(Request $request, $id)
    {
        $name           = $request->name;
        $type_anggaran  = $request->type_anggaran_id;
        $qty            = $request->qty;
        $price          = $request->price;
        $total          = $request->price * $request->qty;
        $proposal_id    = $request->proposal_id;
        $user_id        = Auth::user()->id;
        $proposal_id            = Crypt::decrypt($proposal_id);

        $budget_expenditure                 = BudgetExpenditure::find($id);
        $budget_expenditure->proposal_id    = ($proposal_id);
        $budget_expenditure->name           = ($name);
        $budget_expenditure->type_anggaran_id           = ($type_anggaran);
        $budget_expenditure->qty            = ($qty);
        $budget_expenditure->price          = ($price);
        $budget_expenditure->total          = ($total);
        $budget_expenditure->update();

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Pengeluaran Anggaran di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function destroy_budgetexpenditure(Request $request, $id)
    {
        $budget_expenditure = BudgetExpenditure::find($id)->delete();
        $proposal_id   = $request->proposal_id;

        toastr()->success('Pengeluaran Anggaran di Proposal berhasil dihapus.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_planning(Request $request)
    {
        $data = $request->all();
        $proposal_id = $request->proposal_id;
        $user_id = Auth::user()->id;
        //Tab Jadwal Perencanaan
        $jadwal_kegiatan = $data["jadwal_kegiatan"];
        $jadwal_userID = $data["jadwal_user_id"];
        $jadwal_date = $data["jadwal_date"];
        $jadwal_end_date = $data["jadwal_end_date"];
        $jadwal_notes = $data["jadwal_notes"];
        $proposal_id            = Crypt::decrypt($proposal_id);

        if ($jadwal_userID) {
            foreach ($jadwal_userID  as $key => $value) {
                $jadwal = new PlanningSchedule();
                $jadwal->proposal_id = $proposal_id;
                $jadwal->user_id = $jadwal_userID[$key];
                $jadwal->kegiatan = $jadwal_kegiatan[$key];
                $jadwal->notes = $jadwal_notes[$key];
                $jadwal->date = $jadwal_date[$key];
                $jadwal->end_date = $jadwal_end_date[$key];
                $jadwal->save();
            }
        }

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Jadwal Perencanaan di Proposal berhasil ditambahkan.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function update_planning(Request $request, $id)
    {
        $user_id        = $request->user_id;
        $kegiatan       = $request->kegiatan;
        $notes          = $request->notes;
        $date           = $request->date;
        $end_date       = $request->end_date;
        $proposal_id    = $request->proposal_id;
        $update_user_id = Auth::user()->id;

        $proposal_id            = Crypt::decrypt($proposal_id);
        $planning               = PlanningSchedule::find($id);
        $planning->proposal_id  = ($proposal_id);
        $planning->user_id      = ($user_id);
        $planning->kegiatan     = ($kegiatan);
        $planning->notes        = ($notes);
        $planning->date         = ($date);
        $planning->end_date     = ($end_date);
        $planning->update();

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($update_user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Jadwal Perencanaan di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function destroy_planning(Request $request, $id)
    {
        $planning       = PlanningSchedule::find($id)->delete();
        $proposal_id    = $request->proposal_id;

        toastr()->success('Jadwal Perencanaan di Proposal berhasil dihapus.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_schedule(Request $request)
    {
        $data = $request->all();
        $proposal_id = $request->proposal_id;
        $user_id = Auth::user()->id;
        $proposal_id            = Crypt::decrypt($proposal_id);
        //Tab Susunan Acara
        $susunan_kegiatan = $data["susunan_kegiatan"];
        $susunan_userID = $data["susunan_user_id"];
        $susunan_time = $data["susunan_time"];
        $susunan_end_time = $data["susunan_end_time"];
        $susunan_notes = $data["susunan_notes"];

        if ($susunan_userID) {
            foreach ($susunan_userID  as $key => $value) {
                $susunan = new Schedule();
                $susunan->proposal_id = $proposal_id;
                $susunan->user_id = $susunan_userID[$key];
                $susunan->kegiatan = $susunan_kegiatan[$key];
                $susunan->notes = $susunan_notes[$key];
                $susunan->times = $susunan_time[$key];
                $susunan->end_time = $susunan_end_time[$key];
                $susunan->save();
            }
        }

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Susunan Acara di Proposal berhasil ditambahkan.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function update_schedule(Request $request, $id)
    {
        $user_id        = $request->user_id;
        $kegiatan       = $request->kegiatan;
        $notes          = $request->notes;
        $times          = $request->times;
        $end_time       = $request->end_time;
        $proposal_id    = $request->proposal_id;
        $update_user_id = Auth::user()->id;
        $proposal_id            = Crypt::decrypt($proposal_id);

        $schedule               = Schedule::find($id);
        $schedule->proposal_id  = ($proposal_id);
        $schedule->user_id      = ($user_id);
        $schedule->kegiatan     = ($kegiatan);
        $schedule->notes        = ($notes);
        $schedule->times        = ($times);
        $schedule->end_time     = ($end_time);
        $schedule->update();

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Susunan Acara di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function destroy_schedule(Request $request, $id)
    {
        $schedule       = Schedule::find($id)->delete();
        $proposal_id    = $request->proposal_id;

        toastr()->success('Susunan Acara di Proposal berhasil dihapus.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_participant(Request $request)
    {
        $data = $request->all();
        $proposal_id = $request->proposal_id;
        $user_id = Auth::user()->id;
        $proposal_id            = Crypt::decrypt($proposal_id);
        $peserta_participant_type_id = $data["peserta_participant_type_id"];
        $peserta_participant_total = $data["peserta_participant_total"];
        $peserta_notes = $data["peserta_notes"];

        if ($peserta_participant_type_id) {
            foreach ($peserta_participant_type_id  as $key => $value) {
                $peserta = new Participant();
                $peserta->proposal_id = $proposal_id;
                $peserta->participant_type_id = $peserta_participant_type_id[$key];
                $peserta->participant_total = $peserta_participant_total[$key];
                $peserta->notes = $peserta_notes[$key];
                $peserta->save();
            }
        }

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Partisipan di Proposal berhasil ditambahkan.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function update_participant(Request $request, $id)
    {
        $participant_type_id        = $request->participant_type_id;
        $participant_total          = $request->participant_total;
        $notes                      = $request->participant_notes;
        $proposal_id                = $request->proposal_id;
        $user_id                    = Auth::user()->id;
        $proposal_id            = Crypt::decrypt($proposal_id);

        $participant                        = Participant::find($id);
        $participant->proposal_id           = ($proposal_id);
        $participant->participant_type_id   = ($participant_type_id);
        $participant->participant_total     = ($participant_total);
        $participant->notes                 = ($notes);
        $participant->update();

        $proposal               = Proposal::find($proposal_id);
        $proposal->updated_by   = ($user_id);
        $proposal->updated_at   = now();
        $proposal->update();

        $proposal_id            = Crypt::encrypt($proposal_id);
        toastr()->success('Partisipan di Proposal berhasil dirubah.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function destroy_participant(Request $request, $id)
    {
        $participant       = Participant::find($id)->delete();
        $proposal_id    = $request->proposal_id;

        toastr()->success('Partisipan di Proposal berhasil dihapus.');
        return redirect()->route('admin.proposals.edit', $proposal_id);
    }

    public function store_revision(Request $request)
    {
        request()->validate(Revision::$rules);
        $proposal_id    = $request->proposal_id;
        $proposal_id = Crypt::encrypt($proposal_id);

        $revision = Revision::create($request->all());

        toastr()->success('Revisi di Proposal berhasil ditambahkan.');
        return redirect()->route('admin.proposals.show', $proposal_id);
    }

    public function revision_done(Request $request, $id)
    {
        $proposal_id                = $request->proposal_id;

        $revision                   = Revision::find($id);
        $revision->isDone           = 1;
        $revision->update();

        $proposal_id                = Crypt::encrypt($proposal_id);
        return redirect()->route('admin.proposals.show', $proposal_id);
    }

    public function revision_undone(Request $request, $id)
    {
        $proposal_id                = $request->proposal_id;

        $revision                   = Revision::find($id);
        $revision->isDone           = 0;
        $revision->update();

        $proposal_id                = Crypt::encrypt($proposal_id);
        return redirect()->route('admin.proposals.show', $proposal_id);
    }
    /*
    APPROVAL PROPOSAL FUNCTION
    */

    public function approved(Request $request)
    {
        $date = date('d/m/Y');
        $proposal_id                = $request->proposal_id;

        $level                      = $request->level;
        $timestamp                  = now();

        $approval                   = Approval::where('proposal_id', $proposal_id)->where('level', $level)->first();
        $approval->approved         = $request->approved;
        $approval->date             = $date;
        $approval->updated_at       = $timestamp;
        $approval->update();

        $proposal_id                = Crypt::encrypt($proposal_id);
        return redirect()->route('admin.proposals.show', $proposal_id);
    }

    /*
    END OF APPROVAL PROPOSAL FUNCTION
    */

    public function update_profile()
    {
        abort_if(!Gate::denies('MANAGE_MASTER_DATA'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id = Auth::id();
        $isExist = Student::select('user_id')->where('user_id', $id)->exists();
        $users = User::pluck('id', 'name');
        $organizations = Organization::pluck('id', 'name');

        if ($isExist) {
            $student = Student::where('user_id', $id)->first();
            return view('student.edit', compact('student', 'users', 'organizations'));
        } elseif (!$isExist) {
            $students = Student::create([
                'user_id' => $id,
                'nim' => '000000',
                'prodi' => 'Update Prodi',
                'kelas' => 'Update Kelas',
                'position' => 'Update Posisi'
            ]);
            $student = Student::where('user_id', $id)->first();
            return view('student.edit', compact('student', 'users', 'organizations'));
        }
    }

    public function report()
    {
        $chart_options = [
            'chart_title' => 'Proposal by Organizations',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Proposal',
            'group_by_field' => 'org_name',
            'chart_type' => 'bar',
        ];
        $chartProposal = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Proposal by Event',
            'report_type' => 'group_by_relationship',
            'relationship_name' => 'event',
            'model' => 'App\Models\Proposal',
            'group_by_field' => 'name',
            'chart_type' => 'pie',
        ];
        $chartEvent = new LaravelChart($chart_options);
        $proposals = Proposal::whereHas('approval', function ($query) {
            $query->where('name', 'BAS')
                ->where('approved', 1);
        })->orderBy('created_at', 'DESC')->get();

        return view('proposal.report.index', compact('chartProposal', 'chartEvent', 'proposals'));
    }
}
