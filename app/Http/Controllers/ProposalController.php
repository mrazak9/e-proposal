<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Place;
use App\Models\Event;
use App\Models\Student;
use App\Models\ParticipantType;
use App\Http\Requests;
use App\Models\BudgetExpenditure;
use App\Models\BudgetReceipt;
use App\Models\Committee;
use App\Models\Participant;
use App\Models\PlanningSchedule;
use App\Models\Schedule;
use Illuminate\Http\Request;

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
        $proposals = Proposal::orderBy('created_at', 'DESC')->paginate();

        return view('proposal.index', compact('proposals'))
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
        $student = Student::with('user')->get()->pluck('user.name', 'user_id');
        return view('proposal.create', compact('proposal', 'place', 'event', 'student', 'participantType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        request()->validate(Proposal::$rules);
        $proposal = Proposal::create($request->all());

        //Tab Kepanitiaan
        $panitia = $data["kepanitiaan_user_id"];
        $peran = $data["kepanitiaan_position"];

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
        
        if($panitia) {
            foreach ($panitia  as $key => $value) {
                $kepanitiaan = new Committee();
                $kepanitiaan->proposal_id = $proposal["id"];
                $kepanitiaan->user_id = $panitia[$key];
                $kepanitiaan->position = $peran[$key];
                $kepanitiaan->save();
            }           
        }
        if($penerimaan_name) {
            foreach ($penerimaan_name  as $key => $value) {
            $penerimaan = new BudgetReceipt();
            $penerimaan->proposal_id = $proposal["id"];
            $penerimaan->name = $penerimaan_name[$key];
            $penerimaan->qty = $penerimaan_qty[$key];
            $penerimaan->price = $penerimaan_price[$key];
            $penerimaan->total = $penerimaan_price[$key] * $penerimaan_qty[$key];
            $penerimaan->save();
            }
        }
        if($pengeluaran_name) {
            foreach ($pengeluaran_name  as $key => $value) {
            $pengeluaran = new BudgetExpenditure();
            $pengeluaran->proposal_id = $proposal["id"];
            $pengeluaran->name = $pengeluaran_name[$key];
            $pengeluaran->qty = $pengeluaran_qty[$key];
            $pengeluaran->price = $pengeluaran_price[$key];
            $pengeluaran->total = $pengeluaran_price[$key] * $pengeluaran_qty[$key];
            $pengeluaran->save();
            }
        }
        if($jadwal_userID) {
            foreach ($jadwal_userID  as $key => $value) {
            $jadwal = new PlanningSchedule();
            $jadwal->proposal_id = $proposal["id"];
            $jadwal->user_id = $jadwal_userID[$key];
            $jadwal->kegiatan = $jadwal_kegiatan[$key];
            $jadwal->notes = $jadwal_notes[$key];
            $jadwal->date = $jadwal_date[$key];
            $jadwal->save();
            }
        }
        if($susunan_userID) {
            foreach ($susunan_userID  as $key => $value) {
            $susunan = new Schedule();
            $susunan->proposal_id = $proposal["id"];
            $susunan->user_id = $susunan_userID[$key];
            $susunan->kegiatan = $susunan_kegiatan[$key];
            $susunan->notes = $susunan_notes[$key];
            $susunan->times = $susunan_time[$key];
            $susunan->save();
            }
        }
        if($peserta_participant_type_id) {
            foreach ($peserta_participant_type_id  as $key => $value) {
            $peserta = new Participant();
            $peserta->proposal_id = $proposal["id"];
            $peserta->participant_type_id = $peserta_participant_type_id[$key];
            $peserta->participant_total = $peserta_participant_total[$key];
            $peserta->save();
            }
        }

        return redirect()->route('admin.proposals.index')
            ->with('success', 'Proposal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::find($id);
        $committee = Committee::where('proposal_id', $id)->get();
        $budget_receipt = BudgetReceipt::where('proposal_id', $id)->get();
        $sum_budget_receipt = BudgetReceipt::sum('total');

        return view('proposal.show', 
        compact('proposal',
        'committee',
        'budget_receipt',
        'sum_budget_receipt'))
        ->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);

        return view('proposal.edit', compact('proposal'));
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

        return redirect()->route('admin.proposals.index')
            ->with('success', 'Proposal updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proposal = Proposal::find($id)->delete();

        return redirect()->route('admin.proposals.index')
            ->with('success', 'Proposal deleted successfully');
    }
}
