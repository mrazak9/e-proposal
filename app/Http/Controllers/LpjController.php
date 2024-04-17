<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Lpj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;
use App\Models\BudgetReceipt;
use App\Models\TypeAnggaran;
use App\Models\BudgetExpenditure;
use App\Models\Committee;
use App\Models\LpjApproval;
use App\Models\LpjRevision;
use App\Models\Participant;
use App\Models\ParticipantType;
use App\Models\PlanningSchedule;
use App\Models\Proposal;
use App\Models\RealizeBudgetExpenditure;
use App\Models\RealizeBudgetReceipt;
use App\Models\RealizeParticipant;
use App\Models\RealizePlanningSchedule;
use App\Models\RealizeSchedule;
use App\Models\Schedule;
use Auth;
use Carbon\Carbon;

/**
 * Class LpjController
 * @package App\Http\Controllers
 */
class LpjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //CEK Approved
        $currentYear = Carbon::now()->year;

        $lpj_success = Lpj::whereHas('lpj_approval', function ($query) {
            $query->where('approved', 1)
                ->where('name', "BAS");
        })->whereYear('created_at', $currentYear)->count();
        //Check Roles Login
        if (Auth::user()->hasRole('PEMBINA')) {
            $lpjs = Lpj::whereHas('lpj_approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA HIMA")
                    ->orWhere('approved', 1)
                    ->where('name', "KETUA BPM");
            })->orderBy('created_at', 'DESC')
                ->paginate(10);
        } elseif (Auth::user()->hasRole('KAPRODI')) {
            $lpjs = Lpj::whereHas('lpj_approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA HIMA");
            })->orderBy('created_at', 'DESC')
                ->paginate(10);
        } elseif (Auth::user()->hasRole('ADMIN')) {
            $lpjs = Lpj::whereHas('lpj_approval', function ($query) {
                $query->where('approved', 0)
                    ->orWhere('approved', 1);
            })->orderBy('created_at', 'DESC')
                ->paginate(10);
        } elseif (Auth::user()->hasRole('REKTOR')) {
            $lpjs = Lpj::whereHas('lpj_approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "KETUA PRODI")
                    ->orWhere('approved', 1)
                    ->where('name', "PEMBINA MHS");
            })->orderBy('created_at', 'DESC')
                ->paginate(10);
        } elseif (Auth::user()->hasRole('BAS')) {
            $lpjs = Lpj::whereHas('lpj_approval', function ($query) {
                $query->where('approved', 1)->where('name', "REKTOR");
            })->orderBy('created_at', 'DESC')
                ->paginate(10);
        }
        //End of Check Roles Login 
        elseif (Auth::user()->hasRole('KETUA_HIMATIK')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('org_name', 'HIMATIK')
                    ->orWhere('owner', 'KSM');
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMASI')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('org_name', 'HIMASI')
                    ->orWhere('owner', 'KSM');
            })->paginate();
        }        
        elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('org_name', 'HIMAKOMPAK');
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('org_name', 'HIMAADBIS');
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_BEM')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('org_name', 'BEM')
                    ->orWhere('owner', 'UKM');
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_BPM')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('org_name', 'BPM')
                    ->orWhere('org_name', 'BEM');
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_UKM')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('owner', 'UKM');
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_KSM')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) {
                $query->where('owner', 'KSM');
            })->paginate();
        }

        return view('lpj.index', compact('lpjs', 'lpj_success'))
            ->with('i', (request()->input('page', 1) - 1) * $lpjs->perPage());
    }

    public function search(Request $request)
    {
        $search = $request->search;
        //CEK ROLES
        if (
            Auth::user()->hasRole('ADMIN') ||
            Auth::user()->hasRole('KAPRODI') ||
            Auth::user()->hasRole('PEMBINA') ||
            Auth::user()->hasRole('REKTOR') ||
            Auth::user()->hasRole('BAS')
        ) {
            $lpjs = Lpj::paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMATIK')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) use ($search) {
                $query->where('org_name', 'HIMATIK')
                    ->orWhere('owner', 'KSM')
                    ->where('name', 'LIKE', "%{$search}%");
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMASI')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) use ($search) {
                $query->where('org_name', 'HIMASI')
                    ->orWhere('owner', 'KSM')
                    ->where('name', 'LIKE', "%{$search}%");
            })->paginate();
        }        
        elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) use ($search) {
                $query->where('org_name', 'HIMAKOMPAK')
                    ->where('name', 'LIKE', "%{$search}%");
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) use ($search) {
                $query->where('org_name', 'HIMAADBIS')
                    ->where('name', 'LIKE', "%{$search}%");
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_BEM')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) use ($search) {
                $query->where('org_name', 'BEM')
                    ->orWhere('owner', 'UKM')
                    ->where('name', 'LIKE', "%{$search}%");
            })->paginate();
        } elseif (Auth::user()->hasRole('KETUA_BPM')) {
            $lpjs = Lpj::whereHas('proposal', function ($query) use ($search) {
                $query->where('org_name', 'BPM')
                    ->orWhere('org_name', 'BEM')
                    ->where('name', 'LIKE', "%{$search}%");
            })->paginate();
        }


        return view('lpj.index', compact('lpjs'))
            ->with('i', (request()->input('page', 1) - 1) * $lpjs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lpj = new Lpj();
        return view('lpj.create', compact('lpj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lpj::$rules);

        $lpj = Lpj::create($request->all());

        return redirect()->route('admin.lpjs.index')
            ->with('success', 'Lpj created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal_id = $id;
        $lpj = Lpj::where('proposal_id', $proposal_id)->first();
        $lpj_id = $lpj->id;

        //Budget Receipt
        $realize_br = RealizeBudgetReceipt::where('lpj_id', $lpj_id)->get();
        $sum_realize_budget_receipt = RealizeBudgetReceipt::where('lpj_id', $lpj_id)->sum('total');
        //End Budget Receipt

        //Budget Expenditure
        $realize_be = RealizeBudgetExpenditure::where('lpj_id', $lpj_id)->get();
        $sum_realize_budget_expenditure = RealizeBudgetExpenditure::where('lpj_id', $lpj_id)->sum('total');
        //End Budget Expenditure

        //Planning Schedule
        $realize_ps = RealizePlanningSchedule::where('lpj_id', $lpj_id)->get();
        //End Planning Schedule

        //Planning Schedule
        $realize_s = RealizeSchedule::where('lpj_id', $lpj_id)->get();
        //End Planning Schedule

        //Participants
        $realize_p = RealizeParticipant::where('lpj_id', $lpj_id)->get();
        $sum_realize_participants = RealizeParticipant::where('lpj_id', $lpj_id)->sum('participant_total');
        //End Participants


        return view('lpj.finalize_update', compact(
            'proposal_id',
            'lpj',
            'realize_br',
            'realize_be',
            'realize_ps',
            'realize_s',
            'realize_p',
            'budget_receipt',
            'budget_expenditure',
            'type_anggaran',
            'schedule',
            'student',
            'planning_schedule',
            'participantType',
            'panitiaCount',
            'participants',
            'sum_budget_receipt',
            'sum_realize_budget_receipt',
            'sum_realize_budget_expenditure',
            'sum_participants',
            'sum_budget_expenditure',
            'sum_realize_participants'
        ));

        return view('lpj.show', compact('lpj'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lpj = Lpj::find($id);

        return view('lpj.edit', compact('lpj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lpj $lpj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lpj $lpj)
    {
        request()->validate(Lpj::$rules);

        $lpj->update($request->all());

        return back()->with('success', 'Lpj updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lpj = Lpj::find($id)->delete();

        return redirect()->route('admin.lpjs.index')
            ->with('success', 'Lpj deleted successfully');
    }

    public function finalize($id)
    {
        $id = Crypt::decrypt($id);
        $proposal_id = $id;
        $isExist = Lpj::select('proposal_id')->where('proposal_id', $id)->exists();
        $cekApproval = Approval::select('approved')->where('proposal_id', $id)->where('name', 'BAS')->first();
        $cekOwner = Proposal::select('owner')->where('id', $proposal_id)->first();

        //cek Approval BAS
        if ($cekApproval->approved == '0') {
            return abort(401);
        }
        //

        $budget_receipt = BudgetReceipt::where('proposal_id', $proposal_id)->get();
        $budget_expenditure = BudgetExpenditure::where('proposal_id', $proposal_id)->get();
        $type_anggaran = TypeAnggaran::orderBy('name', 'ASC')->pluck('id', 'name');
        $schedule = Schedule::where('proposal_id', $id)->get();
        $student = Committee::where('proposal_id', $id)->get();
        $planning_schedule = PlanningSchedule::where('proposal_id', $id)->get();
        $participantType = ParticipantType::pluck('id', 'name');
        $committee = Committee::where('proposal_id', $id)->get();
        $panitiaCount = $committee->count();
        $sum_budget_receipt = BudgetReceipt::where('proposal_id', $id)->sum('total');
        $sum_budget_expenditure = BudgetExpenditure::where('proposal_id', $id)->sum('total');
        $participants = Participant::where('proposal_id', $id)->get();
        $sum_participants = Participant::where('proposal_id', $id)->sum('participant_total');

        if ($isExist) {

            $lpj = Lpj::where('proposal_id', $proposal_id)->first();
            $lpj_id = $lpj->id;

            //Budget Receipt
            $realize_br = RealizeBudgetReceipt::where('lpj_id', $lpj_id)->get();
            $sum_realize_budget_receipt = RealizeBudgetReceipt::where('lpj_id', $lpj_id)->sum('total');
            //End Budget Receipt

            //Budget Expenditure
            $realize_be = RealizeBudgetExpenditure::where('lpj_id', $lpj_id)->get();
            $sum_realize_budget_expenditure = RealizeBudgetExpenditure::where('lpj_id', $lpj_id)->sum('total');
            //End Budget Expenditure

            //Planning Schedule
            $realize_ps = RealizePlanningSchedule::where('lpj_id', $lpj_id)->get();
            //End Planning Schedule

            //Planning Schedule
            $realize_s = RealizeSchedule::where('lpj_id', $lpj_id)->get();
            //End Planning Schedule

            //Participants
            $realize_p = RealizeParticipant::where('lpj_id', $lpj_id)->get();
            $sum_realize_participants = RealizeParticipant::where('lpj_id', $lpj_id)->sum('participant_total');
            //End Participants

            //Check Approval
            $getApproval2 = LpjApproval::select('level', 'approved')
                ->where('lpj_id', $lpj_id)
                ->where('level', 2)
                ->where('approved', 1)
                ->first();
            $getApproval3 = LpjApproval::select('level', 'approved')
                ->where('lpj_id', $lpj_id)
                ->where('level', 3)
                ->where('approved', 1)
                ->first();
            $getApproval4 = LpjApproval::select('level', 'approved')
                ->where('lpj_id', $lpj_id)
                ->where('level', 4)
                ->where('approved', 1)
                ->first();
            $getApproval5 = LpjApproval::select('level', 'approved')
                ->where('lpj_id', $lpj_id)
                ->where('level', 5)
                ->where('approved', 1)
                ->first();
            //End of Check Approval
            $revisions = LpjRevision::where('lpj_id', $lpj_id)->get();
            $selisih = $sum_budget_receipt - $sum_budget_expenditure;
            $hasil_selisih = number_format($selisih);
            $selisih_akhir = $sum_realize_budget_receipt - $sum_realize_budget_expenditure;
            $hasil_selisih_akhir = number_format($selisih_akhir);

            return view('lpj.finalize_update', compact(
                'proposal_id',
                'cekOwner',
                'lpj',
                'realize_br',
                'realize_be',
                'realize_ps',
                'realize_s',
                'realize_p',
                'budget_receipt',
                'budget_expenditure',
                'type_anggaran',
                'schedule',
                'student',
                'planning_schedule',
                'participantType',
                'panitiaCount',
                'participants',
                'sum_budget_receipt',
                'sum_realize_budget_receipt',
                'sum_realize_budget_expenditure',
                'sum_participants',
                'sum_budget_expenditure',
                'sum_realize_participants',
                'getApproval2',
                'getApproval3',
                'getApproval4',
                'getApproval5',
                'revisions',
                'selisih',
                'hasil_selisih',
                'selisih_akhir',
                'hasil_selisih_akhir'
            ));
        } elseif (!$isExist) {
            return view('lpj.finalize', compact('proposal_id', 'cekOwner'));
        }
    }
    public function post_lpj(Request $request)
    {
        request()->validate(Lpj::$rules);
        $getowner = $request->owner;
        $getId = Auth::user()->id;

        $lpj = Lpj::create([
            'proposal_id'               => $request->proposal_id,
            'keberhasilan'              => $request->keberhasilan,
            'kendala'                   => $request->kendala,
            'notes'                     => $request->notes,
            'link_lampiran'             => $request->link_lampiran,
            'link_dokumentasi_kegiatan' => $request->link_dokumentasi_kegiatan,
            'attachment'                => $request->attachment,
        ]);

        switch ($getowner) {
            case ("HIMA"):
                $data = array(
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA HIMA',
                        'approved'      => 0,
                        'level'         => 1,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA PRODI',
                        'approved'      => 0,
                        'level'         => 2,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'REKTOR',
                        'approved'      => 0,
                        'level'         => 3,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'BAS',
                        'approved'      => 0,
                        'level'         => 4,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    )

                );
                break;
            case ("KSM"):
                $data = array(
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA HIMA',
                        'approved'      => 0,
                        'level'         => 1,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA PRODI',
                        'approved'      => 0,
                        'level'         => 2,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'REKTOR',
                        'approved'      => 0,
                        'level'         => 3,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'BAS',
                        'approved'      => 0,
                        'level'         => 4,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    )
                );
                break;
            case ("BEM"):
                $data = array(
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA BEM',
                        'approved'      => 0,
                        'level'         => 1,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA BPM',
                        'approved'      => 0,
                        'level'         => 2,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'PEMBINA MHS',
                        'approved'      => 0,
                        'level'         => 3,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'REKTOR',
                        'approved'      => 0,
                        'level'         => 4,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'BAS',
                        'approved'      => 0,
                        'level'         => 5,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    )

                );
                break;
            case ("UKM"):
                $data = array(
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA BEM',
                        'approved'      => 0,
                        'level'         => 1,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA BPM',
                        'approved'      => 0,
                        'level'         => 2,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'PEMBINA MHS',
                        'approved'      => 0,
                        'level'         => 3,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'REKTOR',
                        'approved'      => 0,
                        'level'         => 4,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'BAS',
                        'approved'      => 0,
                        'level'         => 5,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    )

                );
                break;
            case ("BPM"):
                $data = array(
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'KETUA BPM',
                        'approved'      => 0,
                        'level'         => 1,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'PEMBINA MHS',
                        'approved'      => 0,
                        'level'         => 2,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'REKTOR',
                        'approved'      => 0,
                        'level'         => 3,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    ),
                    array(
                        'lpj_id'        => $lpj["id"],
                        'user_id'       => $getId,
                        'name'          => 'BAS',
                        'approved'      => 0,
                        'level'         => 4,
                        'date'          => date('d/m/Y'),
                        'created_at'    => now()
                    )

                );
                break;
        }

        LpjApproval::insert($data);

        return back()->with('success', 'LPJ berhasil ditambahkan');
    }

    public function update_lpj(Request $request)
    {
        $id                         = $request->id;
        $keberhasilan               = $request->keberhasilan;
        $kendala                    = $request->kendala;
        $notes                      = $request->notes;
        $link_lampiran              = $request->link_lampiran;
        $link_dokumentasi_kegiatan  = $request->link_dokumentasi_kegiatan;
        $attachment                 = $request->attachment;
        

        $lpj                                = Lpj::find($id);
        $lpj->keberhasilan                  = $keberhasilan;
        $lpj->kendala                       = $kendala;
        $lpj->notes                         = $notes;
        $lpj->link_lampiran                 = $link_lampiran;
        $lpj->link_dokumentasi_kegiatan     = $link_dokumentasi_kegiatan;
        $lpj->attachment                    = $attachment;
        $lpj->update();

        toastr()->success('LPJ updated successfully.');
        return redirect()->route('admin.proposals.index');
    }

    public function approved(Request $request)
    {
        $date = date('d/m/Y');
        $lpj_id                     = $request->lpj_id;
        $getProposalId              = Lpj::select('proposal_id')->where('id', $lpj_id)->first();
        $level                      = $request->level;
        $timestamp                  = now();
        $approved                   = $request->approved;

        if (Auth::user()->hasRole('BAS')) {
            $lpjApproval                   = LpjApproval::where('lpj_id', $lpj_id)->where('level', $level)->first();
            $lpjApproval->approved         = $approved;
            $lpjApproval->user_id           = Auth::user()->id;
            $lpjApproval->date             = $date;
            $lpjApproval->updated_at       = $timestamp;
            $lpjApproval->update();

            $proposal                      = Proposal::find($getProposalId->proposal_id);
            $proposal->isFinished          = $approved;
            $proposal->update();
        } else {
            $lpjApproval                   = LpjApproval::where('lpj_id', $lpj_id)->where('level', $level)->first();
            $lpjApproval->approved         = $approved;
            $lpjApproval->user_id           = Auth::user()->id;
            $lpjApproval->date             = $date;
            $lpjApproval->updated_at       = $timestamp;
            $lpjApproval->update();
        }

        toastr()->success('Berhasil Memproses Persetujuan LPJ');
        return redirect()->route('admin.lpjs.index');
    }

    public function revoke(Request $request)
    {
        $id                     = $request->lpj_id;

        $lpj                    = Lpj::find($id);
        $lpj->is_approved       = 0;
        $lpj->update();

        toastr()->warning('Berhasil membatalkan persetujuan LPJ');
        return redirect()->route('admin.lpjs.index');
    }
    public function print($id)
    {
        $id = Crypt::decrypt($id);
        $getLPJId   = Lpj::select('id')->where('proposal_id', $id)->first();        
        $getLPJId = $getLPJId->id;
        $getLPJ     = Lpj::select('keberhasilan','kendala','notes')->where('proposal_id', $id)->first();

        $proposals = Proposal::find($id);
        $committee = Committee::where('proposal_id', $id)->get();
        $sum_committee = Committee::where('proposal_id', $id)->count();
        $budget_receipt = RealizeBudgetReceipt::where('lpj_id', $getLPJId)->get();
        $budget_expenditure = RealizeBudgetExpenditure::where('lpj_id', $getLPJId)->get();
        $planning_schedule = RealizePlanningSchedule::where('lpj_id', $getLPJId)->orderBy('start_date', 'ASC')->get();
        $schedule = RealizeSchedule::where('lpj_id', $getLPJId)->orderBy('date', 'ASC')->orderBy('start_time', 'ASC')->get();
        $participants = RealizeParticipant::where('lpj_id', $getLPJId)->get();
        $sum_budget_receipt = RealizeBudgetReceipt::where('lpj_id', $getLPJId)->sum('total');
        $sum_budget_expenditure = RealizeBudgetExpenditure::where('lpj_id', $getLPJId)->sum('total');
        $sum_participants = RealizeParticipant::where('lpj_id', $getLPJId)->sum('participant_total');
        $approvals = LpjApproval::where('lpj_id', $getLPJId)->where('approved', 1)->orderBy('level', 'ASC')->get();

        return view(
            'lpj.report.print',
            compact(
                'getLPJ',
                'approvals',
                'proposals',
                'committee',
                'sum_committee',
                'budget_receipt',
                'budget_expenditure',
                'planning_schedule',
                'schedule',
                'participants',
                'sum_budget_receipt',
                'sum_budget_expenditure',
                'sum_participants'
            )
        );
    }

    public function store_revision(Request $request)
    {
        request()->validate(LpjRevision::$rules);
        $lpj_id    = $request->lpj_id;

        $revision = LpjRevision::create($request->all());

        return back()->with('success', 'Revisi/komentar berhasil ditambahkan');
    }

    public function revision_done(Request $request, $id)
    {
        $lpj_id                = $request->lpj_id;

        $revision                   = LpjRevision::find($id);
        $revision->isDone           = 1;
        $revision->update();

        return back()->with('success', 'Revisi telah di set selesai');
    }

    public function revision_undone(Request $request, $id)
    {
        $lpj_id                = $request->lpj_id;

        $revision                   = LpjRevision::find($id);
        $revision->isDone           = 0;
        $revision->update();

        return back()->with('alert', 'Revisi telah di set belum selesai');
    }

    public function documentation()
    {
        $documentations     = Lpj::latest()->paginate(20);

        return view(
            'lpj.documentation.index',
            compact(
                'documentations'
            )
        );
    }
}