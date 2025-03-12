<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposal;
use App\Models\DedicationProposalDetail;
use App\Models\DedicationProposalMember;
use App\Models\DedicationProposalSchedule;
use App\Models\Department;
use App\Models\LppmUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class DedicationProposalController
 * @package App\Http\Controllers
 */
class DedicationProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Update LPPM USER FIRST!
        $id             = Auth::user()->id;
        $lppmUser       = new LppmUser();
        if (Auth::user()->hasAnyRole(['KETUA_PENELITIAN', 'ANGGOTA_PENELITIAN','KETUA_LPPM']) && LppmUser::where('user_id', $id)->doesntExist()) {
            $departments = Department::orderBy('name', 'ASC')->pluck('id', 'name');
            return view('lppm-user.create', compact('departments','lppmUser'))->with('warning','Lengkapi profil terlebih dahulu. Sebelum melanjutkan!');
        }
        //
        if (Auth::user()->hasRole('KETUA_LPPM')) {
            $dedicationProposals = DedicationProposal::whereIn('application_status', ['1', '2', '3'])->latest()->get();
        } else {
            $dedicationProposals = DedicationProposal::latest()->get();
        }
        return view('dedication-proposal.index', compact('dedicationProposals'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dedicationProposal = new DedicationProposal();
        return view('dedication-proposal.create', compact('dedicationProposal'));
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
        $user_id = Auth::user()->id;

        // Validate required fields
        $requiredFields = [
            'title',
            'research_group',
            'cluster_of_knowledge',
            'type_of_skim',
            'location',
            'proposed_year',
            'implementation_year',
            'implementation_date',
            'end_implementation_date',
            'length_of_activity',
            'source_of_funds',
            'name',
            'identity_number',
            'affiliation',
            'summary',
            'keyword',
            'background',
            'state_of_the_art',
            'road_map_research',
            'method_and_design',
            'references',
            'attachment'
        ];

        // foreach ($requiredFields as $field) {
        //     if (empty($data[$field])) {
        //         return redirect()->back()->withInput()->with('error', 'Periksa kembali inputan anda dan pastikan tidak ada yang kosong!');
        //     }
        // }

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $name_file = time() . "_" . $request->file('attachment')->getClientOriginalName();
            $request->file('attachment')->move('data_roadmap_dedication', $name_file);
        } else {
            return redirect()->back()->withInput()->with('error', 'Attachment file is required.');
        }

        // Create dedication proposal
        $dedicationProposal = DedicationProposal::create([
            'user_id'               => $user_id,
            'title'                 => $data['title'],
            'research_group'        => $data['research_group'],
            'cluster_of_knowledge'  => $data['cluster_of_knowledge'],
            'type_of_skim'          => $data['type_of_skim'],
            'location'              => $data['location'],
            'proposed_year'         => $data['proposed_year'],
            'implementation_year'   => $data['implementation_year'],
            'implementation_date'   => $data['implementation_date'],
            'end_implementation_date' => $data['end_implementation_date'],
            'length_of_activity'    => $data['length_of_activity'],
            'source_of_funds'       => $data['source_of_funds'],
            'created_at'            => now(),
        ]);

        // Create dedication proposal detail
        DedicationProposalDetail::create([
            'dedication_proposals_id' => $dedicationProposal->id,
            'summary'               => $data['summary'],
            'keyword'               => $data['keyword'],
            'background'            => $data['background'],
            'state_of_the_art'      => $data['state_of_the_art'],
            'road_map_research'     => $data['road_map_research'],
            'method_and_design'     => $data['method_and_design'],
            'references'            => $data['references'],
            'attachment'            => $name_file,
            'created_at'            => now(),
        ]);

        // Create dedication proposal members
        foreach ($data['name'] as $key => $value) {
            DedicationProposalMember::create([
                'dedication_proposals_id' => $dedicationProposal->id,
                'name'                  => $value,
                'identity_number'       => $data['identity_number'][$key],
                'affiliation'           => $data['affiliation'][$key],
                'created_at'            => now(),
            ]);
        }

        // Create dedication proposal schedules
        foreach ($data['year_at'] as $key => $value) {
            DedicationProposalSchedule::create([
                'dedication_proposals_id' => $dedicationProposal->id,
                'year_at'               => $value,
                'event_name'            => $data['event_name'][$key],
                '1'                     => $data['1'][$key] ?? null,
                '2'                     => $data['2'][$key] ?? null,
                '3'                     => $data['3'][$key] ?? null,
                '4'                     => $data['4'][$key] ?? null,
                '5'                     => $data['5'][$key] ?? null,
                '6'                     => $data['6'][$key] ?? null,
                '7'                     => $data['7'][$key] ?? null,
                '8'                     => $data['8'][$key] ?? null,
                '9'                     => $data['9'][$key] ?? null,
                '10'                    => $data['10'][$key] ?? null,
                '11'                    => $data['11'][$key] ?? null,
                '12'                    => $data['12'][$key] ?? null,
                'created_at'            => now(),
            ]);
        }

        return redirect()->route('admin.dedication-proposals.index')
            ->with('success', 'Dedication proposal created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dedicationProposal = DedicationProposal::find($id);

        return view('dedication-proposal.show', compact('dedicationProposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dedicationProposal = DedicationProposal::find($id);

        return view('dedication-proposal.edit', compact('dedicationProposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DedicationProposal $dedicationProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DedicationProposal $dedicationProposal)
    {
        $id = $dedicationProposal->id;
        $data = $request->all();
        // Validate request data
        $validator = Validator::make(
            $data,
            array_merge(
                DedicationProposal::$rules,
                DedicationProposalDetail::$rules,
                DedicationProposalMember::$rules,
                DedicationProposalSchedule::$rules,
            )
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Periksa kembali inputan anda dan pastikan file tidak ada yang kosong!.');
        }


        $dedicationProposal->fill($data);
        $dedicationProposal->updated_at = now();

        if (isset($data['attachment'])) {
            $attachment = $data['attachment'];
            $fileName = time() . "_" . $attachment->getClientOriginalName();
            $attachment->move('data_roadmap_dedication', $fileName);
            $dedicationProposal->dedicationProposalDetail->attachment = $fileName;
        }

        $dedicationProposal->save();

        DedicationProposalMember::where('dedication_proposals_id', $id)->delete();
        DedicationProposalSchedule::where('dedication_proposals_id', $id)->delete();

        foreach ($data['name'] as $key => $value) {
            DedicationProposalMember::create([
                'dedication_proposals_id' => $id,
                'name' => $data['name'][$key],
                'identity_number' => $data['identity_number'][$key],
                'affiliation' => $data['affiliation'][$key],
                'created_at' => now(),
            ]);
        }

        foreach ($data['year_at'] as $key => $value) {
            DedicationProposalSchedule::create([
                'dedication_proposals_id' => $id,
                'year_at' => $data['year_at'][$key],
                'event_name' => $data['event_name'][$key],
                '1' => $data['1'][$key] ?? 0,
                '2' => $data['2'][$key] ?? 0,
                '3' => $data['3'][$key] ?? 0,
                '4' => $data['4'][$key] ?? 0,
                '5' => $data['5'][$key] ?? 0,
                '6' => $data['6'][$key] ?? 0,
                '7' => $data['7'][$key] ?? 0,
                '8' => $data['8'][$key] ?? 0,
                '9' => $data['9'][$key] ?? 0,
                '10' => $data['10'][$key] ?? 0,
                '11' => $data['11'][$key] ?? 0,
                '12' => $data['12'][$key] ?? 0,
                'created_at' => now(),
            ]);
        }

        return redirect()->back()
            ->with('success', 'Pengajuan berhasil diperbarui!.');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dedicationProposal = DedicationProposal::find($id)->delete();

        return redirect()->route('admin.dedication-proposals.index')
            ->with('success', 'DedicationProposal deleted successfully');
    }

    public function submit(Request $request)
    {
        $id = $request->id;

        $dedicationProposal = DedicationProposal::find($id);

        if ($dedicationProposal->application_status == 0) {
            $dedicationProposal->application_status    = 1;
        } elseif ($dedicationProposal->application_status == 1) {
            $dedicationProposal->application_status    = 0;
        }

        $dedicationProposal->update();

        return redirect()->back()->with('success', 'Berhasil ajukan penelitian, silahkan menunggu verifikasi dari LPPM!');
    }
    public function approve(Request $request)
    {
        $id = $request->id;

        $dedicationProposal = DedicationProposal::find($id);

        if ($dedicationProposal->application_status == 3) {
            $dedicationProposal->application_status    = 1;
        } else {
            $dedicationProposal->application_status    = 3;
        }

        $dedicationProposal->update();

        return redirect()->back()->with('success', 'Berhasil perbarui status penelitian!');
    }

    public function revise(Request $request)
    {
        $id = $request->id;

        $dedicationProposal = DedicationProposal::find($id);

        $dedicationProposal->application_status    = 2;

        $dedicationProposal->update();

        return redirect()->back()->with('success', 'Berhasil perbarui status penelitian!');
    }

    public function approveContract(Request $request)
    {
        $id = $request->id;

        $dedicationProposal = DedicationProposal::find($id);

        $dedicationProposal->contract_status    = 1;

        $dedicationProposal->update();

        return redirect()->back()->with('success', 'Berhasil perbarui status penelitian!');
    }

    public function print($id)
    {
        $dedicationProposal = DedicationProposal::find($id);
        return view('dedication-proposal.report.index',compact('dedicationProposal'));
    }
}
