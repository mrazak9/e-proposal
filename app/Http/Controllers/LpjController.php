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
use App\Models\Participant;
use App\Models\ParticipantType;
use App\Models\PlanningSchedule;
use App\Models\RealizeBudgetExpenditure;
use App\Models\RealizeBudgetReceipt;
use App\Models\RealizeParticipant;
use App\Models\RealizePlanningSchedule;
use App\Models\RealizeSchedule;
use App\Models\Schedule;

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
        $lpjs = Lpj::paginate();

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
        $id_lpj = decrypt($id);
        $lpj = Lpj::find($id_lpj);

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
            //End Participants
            $sum_realize_participants = RealizeParticipant::where('lpj_id', $lpj_id)->sum('participant_total');
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
        } elseif (!$isExist) {
            return view('lpj.finalize', compact('proposal_id'));
        }
    }
    public function post_lpj(Request $request)
    {
        request()->validate(Lpj::$rules);
        $lpj = Lpj::create($request->all());

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

        $lpj                                = Lpj::find($id);
        $lpj->keberhasilan                  = $keberhasilan;
        $lpj->kendala                       = $kendala;
        $lpj->notes                         = $notes;
        $lpj->link_lampiran                 = $link_lampiran;
        $lpj->link_dokumentasi_kegiatan     = $link_dokumentasi_kegiatan;
        $lpj->update();

        toastr()->success('LPJ updated successfully.');
        return redirect()->route('admin.proposals.index');
    }

    public function approve(Request $request)
    {
        $id                     = $request->lpj_id;

        $lpj                    = Lpj::find($id);
        $lpj->is_approved       = 1;
        $lpj->update();

        toastr()->success('LPJ approved successfully.');
        return redirect()->route('admin.lpjs.index');
    }

    public function revoke(Request $request)
    {
        $id                     = $request->lpj_id;

        $lpj                    = Lpj::find($id);
        $lpj->is_approved       = 0;
        $lpj->update();

        toastr()->success('LPJ revoked successfully.');
        return redirect()->route('admin.lpjs.index');
    }
}
