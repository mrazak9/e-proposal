<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposal;
use App\Models\DedicationProposalDetail;
use App\Models\DedicationProposalMember;
use App\Models\DedicationProposalSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $request->validate([
        //     'summary' => ['required', new WordCount(301)],
        //     'background' => ['required', new WordCount(501)],
        //     'road_map_research' => ['required', new WordCount(601)],
        // ]);
        // research_proposals
        $title                  = $data["title"];
        $research_group         = $data["research_group"];
        $cluster_of_knowledge   = $data["cluster_of_knowledge"];
        $type_of_skim           = $data["type_of_skim"];
        $location               = $data["location"];
        $proposed_year          = $data["proposed_year"];
        $implementation_year    = $data["implementation_year"];
        $implementation_date    = $data["implementation_date"];
        $length_of_activity     = $data["length_of_activity"];
        $source_of_funds        = $data["source_of_funds"];
        // 
        // research_proposals_members
        $name                   = $data["name"];
        $identity_number        = $data["identity_number"];
        $affiliation            = $data["affiliation"];
        // 
        // research_proposal_details
        $summary            = $data["summary"];
        $keyword            = $data["keyword"];
        $background         = $data["background"];
        $state_of_the_art   = $data["state_of_the_art"];
        $road_map_research  = $data["road_map_research"];
        $method_and_design  = $data["method_and_design"];
        $references         = $data["references"];
        $attachment_file    = $data["attachment"];

        $name_file = time() . "_" . $attachment_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_roadmap_dedication';
        $attachment_file->move($tujuan_upload, $name_file);
        //  

        // research_proposal_schedules
        $year_at        = $data["year_at"];
        $event_name     = $data["event_name"];
        $cBox1          = $data["1"] ?? null;
        $cBox2          = $data["2"] ?? null;
        $cBox3          = $data["3"] ?? null;
        $cBox4          = $data["4"] ?? null;
        $cBox5          = $data["5"] ?? null;
        $cBox6          = $data["6"] ?? null;
        $cBox7          = $data["7"] ?? null;
        $cBox8          = $data["8"] ?? null;
        $cBox9          = $data["9"] ?? null;
        $cBox10         = $data["10"] ?? null;
        $cBox11         = $data["11"] ?? null;
        $cBox12         = $data["12"] ?? null;
        // 
        // request()->validate(ResearchProposal::$rules);

        $dedicationProposal = DedicationProposal::create([
            'user_id'               => $user_id,
            'title'                 => $title,
            'research_group'        => $research_group,
            'cluster_of_knowledge'  => $cluster_of_knowledge,
            'type_of_skim'          => $type_of_skim,
            'location'              => $location,
            'proposed_year'         => $proposed_year,
            'implementation_year'   => $implementation_year,
            'implementation_date'   => $implementation_date,
            'length_of_activity'    => $length_of_activity,
            'source_of_funds'       => $source_of_funds,
            'created_at'            => now(),

        ]);

        $dedicationProposalId = $dedicationProposal["id"];

        //Dedication Proposal Detail
        $dedicationProposalDetail = DedicationProposalDetail::create([
            'dedication_proposals_id' => $dedicationProposalId,
            'summary'               => $summary,
            'keyword'               => $keyword,
            'background'            => $background,
            'state_of_the_art'      => $state_of_the_art,
            'road_map_research'     => $road_map_research,
            'method_and_design'     => $method_and_design,
            'references'            => $references,
            'attachment'            => $name_file,
            'created_at'            => now(),

        ]);

        //Dedication Proposal Member
        if ($name) {
            foreach ($name  as $key => $value) {
                $dedication_proposals_members                          = new DedicationProposalMember();
                $dedication_proposals_members ->dedication_proposals_id  = $dedicationProposalId;
                $dedication_proposals_members ->name                   = $name[$key];
                $dedication_proposals_members ->identity_number        = $identity_number[$key];
                $dedication_proposals_members ->affiliation            = $affiliation[$key];
                $dedication_proposals_members ->created_at             = now();
                $dedication_proposals_members ->save();
            }
        }
        //Research Proposal Schedule
        if ($year_at) {
            foreach ($year_at  as $key => $value) {
                $dedication_proposals_schedule                        = new DedicationProposalSchedule();
                $dedication_proposals_schedule->dedication_proposals_id = $dedicationProposalId;
                $dedication_proposals_schedule->year_at               = $year_at[$key];
                $dedication_proposals_schedule->event_name            = $event_name[$key];
                $dedication_proposals_schedule->{'1'}                 = $cBox1[$key] ?? null;
                $dedication_proposals_schedule->{'2'}                 = $cBox2[$key] ?? null;
                $dedication_proposals_schedule->{'3'}                 = $cBox3[$key] ?? null;
                $dedication_proposals_schedule->{'4'}                 = $cBox4[$key] ?? null;
                $dedication_proposals_schedule->{'5'}                 = $cBox5[$key] ?? null;
                $dedication_proposals_schedule->{'6'}                 = $cBox6[$key] ?? null;
                $dedication_proposals_schedule->{'7'}                 = $cBox7[$key] ?? null;
                $dedication_proposals_schedule->{'8'}                 = $cBox8[$key] ?? null;
                $dedication_proposals_schedule->{'9'}                 = $cBox9[$key] ?? null;
                $dedication_proposals_schedule->{'10'}                = $cBox10[$key] ?? null;
                $dedication_proposals_schedule->{'11'}                = $cBox11[$key] ?? null;
                $dedication_proposals_schedule->{'12'}                = $cBox12[$key] ?? null;
                $dedication_proposals_schedule->created_at            = now();
                $dedication_proposals_schedule->save();
            }
        }

        return redirect()->route('admin.dedication-proposals.index')
            ->with('success', 'DedicationProposal created successfully.');
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
        request()->validate(DedicationProposal::$rules);

        $dedicationProposal->update($request->all());

        return redirect()->route('admin.dedication-proposals.index')
            ->with('success', 'DedicationProposal updated successfully');
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
}
