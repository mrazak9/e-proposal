<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposal;
use App\Models\ResearchProposalDetail;
use App\Models\ResearchProposalSchedule;
use App\Models\ResearchProposalsMember;
use App\Rules\WordCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class ResearchProposalController
 * @package App\Http\Controllers
 */
class ResearchProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('KETUA_LPPM')) {
            $researchProposals = ResearchProposal::whereIn('application_status', ['1', '2', '3'])->latest()->get();
        } else {
            $researchProposals = ResearchProposal::latest()->get();
        }
        return view('research-proposal.index', compact('researchProposals'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchProposal = new ResearchProposal();
        return view('research-proposal.create', compact('researchProposal'));
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
        $tujuan_upload = 'data_roadmap';
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

        $researchProposal = ResearchProposal::create([
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

        $researchProposalId = $researchProposal["id"];

        //Research Proposal Detail
        $researchProposalDetail = ResearchProposalDetail::create([
            'research_proposals_id' => $researchProposalId,
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

        //Research Proposal Member
        if ($name) {
            foreach ($name  as $key => $value) {
                $research_proposals_members                         = new ResearchProposalsMember();
                $research_proposals_members->research_proposals_id  = $researchProposalId;
                $research_proposals_members->name                   = $name[$key];
                $research_proposals_members->identity_number        = $identity_number[$key];
                $research_proposals_members->affiliation            = $affiliation[$key];
                $research_proposals_members->created_at             = now();
                $research_proposals_members->save();
            }
        }
        //Research Proposal Schedule
        if ($year_at) {
            foreach ($year_at  as $key => $value) {
                $research_proposals_schedule                        = new ResearchProposalSchedule();
                $research_proposals_schedule->research_proposals_id = $researchProposalId;
                $research_proposals_schedule->year_at               = $year_at[$key];
                $research_proposals_schedule->event_name            = $event_name[$key];
                $research_proposals_schedule->{'1'}                 = $cBox1[$key] ?? null;
                $research_proposals_schedule->{'2'}                 = $cBox2[$key] ?? null;
                $research_proposals_schedule->{'3'}                 = $cBox3[$key] ?? null;
                $research_proposals_schedule->{'4'}                 = $cBox4[$key] ?? null;
                $research_proposals_schedule->{'5'}                 = $cBox5[$key] ?? null;
                $research_proposals_schedule->{'6'}                 = $cBox6[$key] ?? null;
                $research_proposals_schedule->{'7'}                 = $cBox7[$key] ?? null;
                $research_proposals_schedule->{'8'}                 = $cBox8[$key] ?? null;
                $research_proposals_schedule->{'9'}                 = $cBox9[$key] ?? null;
                $research_proposals_schedule->{'10'}                = $cBox10[$key] ?? null;
                $research_proposals_schedule->{'11'}                = $cBox11[$key] ?? null;
                $research_proposals_schedule->{'12'}                = $cBox12[$key] ?? null;
                $research_proposals_schedule->created_at            = now();
                $research_proposals_schedule->save();
            }
        }

        return redirect()->route('admin.research-proposals.index')
            ->with('success', 'Pengajuan Penelitian berhasil dibuat!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchProposal = ResearchProposal::find($id);

        return view('research-proposal.show', compact('researchProposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researchProposal = ResearchProposal::find($id);

        return view('research-proposal.edit', compact('researchProposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ResearchProposal $researchProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchProposal $researchProposal)
    {
        // request()->validate(ResearchProposal::$rules);
        $id = $researchProposal->id;

        $data = $request->all();

        $validator = Validator::make($request->all(), ResearchProposal::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }
        $user_id = Auth::user()->id;
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
        $attachment_file    = $data["attachment"]??null;

        //  

        // research_proposal_schedules
        $year_at        = $data["year_at"];
        $event_name     = $data["event_name"];
        $cBox1          = $data["1"] ?? 0;
        $cBox2          = $data["2"] ?? 0;
        $cBox3          = $data["3"] ?? 0;
        $cBox4          = $data["4"] ?? 0;
        $cBox5          = $data["5"] ?? 0;
        $cBox6          = $data["6"] ?? 0;
        $cBox7          = $data["7"] ?? 0;
        $cBox8          = $data["8"] ?? 0;
        $cBox9          = $data["9"] ?? 0;
        $cBox10         = $data["10"] ?? 0;
        $cBox11         = $data["11"] ?? 0;
        $cBox12         = $data["12"] ?? 0;
        // 
        // request()->validate(ResearchProposal::$rules);
        //delete existing data
        $research_proposals_members = ResearchProposalsMember::where('research_proposals_id', $id)->delete();
        $research_proposals_schedule = ResearchProposalSchedule::where('research_proposals_id', $id)->delete();
        $researchProposalDetail                     = ResearchProposalDetail::where('research_proposals_id', $id)->first();
        // Check if an attachment file exists and handle the upload
        if ($attachment_file) {
            $name_file = time() . "_" . $attachment_file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_roadmap';
            $attachment_file->move($tujuan_upload, $name_file);

            // Store the file path in the database
            $researchProposalDetail->attachment = $name_file;
        }
        // Update Research Proposal 
        $researchProposal                           = ResearchProposal::find($id);
        $researchProposal->title                    = $title;
        $researchProposal->research_group           = $research_group;
        $researchProposal->cluster_of_knowledge     = $cluster_of_knowledge;
        $researchProposal->type_of_skim             = $type_of_skim;
        $researchProposal->location                 = $location;
        $researchProposal->proposed_year            = $proposed_year;
        $researchProposal->implementation_year      = $implementation_year;
        $researchProposal->implementation_date      = $implementation_date;
        $researchProposal->length_of_activity       = $length_of_activity;
        $researchProposal->source_of_funds          = $source_of_funds;
        $researchProposal->updated_at               = now();
        $researchProposal->save();

        $researchProposalId = $researchProposal["id"];

        // Update Research Proposal Detail 

        $researchProposalDetail->summary            = $summary;
        $researchProposalDetail->keyword            = $keyword;
        $researchProposalDetail->background         = $background;
        $researchProposalDetail->state_of_the_art   = $state_of_the_art;
        $researchProposalDetail->road_map_research  = $road_map_research;
        $researchProposalDetail->method_and_design  = $method_and_design;
        $researchProposalDetail->references         = $references;
        $researchProposalDetail->updated_at         = now();
        $researchProposalDetail->save();

        // Update Research Proposal Members 


        if ($name) {
            foreach ($name  as $key => $value) {
                $research_proposals_members                         = new ResearchProposalsMember();
                $research_proposals_members->research_proposals_id  = $id;
                $research_proposals_members->name                   = $name[$key];
                $research_proposals_members->identity_number        = $identity_number[$key];
                $research_proposals_members->affiliation            = $affiliation[$key];
                $research_proposals_members->created_at             = now();
                $research_proposals_members->save();
            }
        }

        // Update Research Proposal Schedule 
        if ($year_at) {
            foreach ($year_at  as $key => $value) {
                $research_proposals_schedule                        = new ResearchProposalSchedule();
                $research_proposals_schedule->research_proposals_id = $id;
                $research_proposals_schedule->year_at               = $year_at[$key];
                $research_proposals_schedule->event_name            = $event_name[$key];
                $research_proposals_schedule->{'1'}                 = $cBox1[$key] ?? 0;
                $research_proposals_schedule->{'2'}                 = $cBox2[$key] ?? 0;
                $research_proposals_schedule->{'3'}                 = $cBox3[$key] ?? 0;
                $research_proposals_schedule->{'4'}                 = $cBox4[$key] ?? 0;
                $research_proposals_schedule->{'5'}                 = $cBox5[$key] ?? 0;
                $research_proposals_schedule->{'6'}                 = $cBox6[$key] ?? 0;
                $research_proposals_schedule->{'7'}                 = $cBox7[$key] ?? 0;
                $research_proposals_schedule->{'8'}                 = $cBox8[$key] ?? 0;
                $research_proposals_schedule->{'9'}                 = $cBox9[$key] ?? 0;
                $research_proposals_schedule->{'10'}                = $cBox10[$key] ?? 0;
                $research_proposals_schedule->{'11'}                = $cBox11[$key] ?? 0;
                $research_proposals_schedule->{'12'}                = $cBox12[$key] ?? 0;
                $research_proposals_schedule->created_at            = now();
                $research_proposals_schedule->save();
            }
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
        $researchProposalDetailAtt     = ResearchProposalDetail::select('attachment')->where('research_proposals_id', $id)->first();

        $file = public_path('data_roadmap/' . $researchProposalDetailAtt->attachment);
        $img = File::delete($file);

        $researchProposal           = ResearchProposal::find($id)->delete();
        $researchProposalMember     = ResearchProposalsMember::where('research_proposals_id', $id)->delete();
        $researchProposalDetail     = ResearchProposalDetail::where('research_proposals_id', $id)->delete();
        $researchProposalSchedule   = ResearchProposalSchedule::where('research_proposals_id', $id)->delete();
        $researchProposalMember     = ResearchProposalsMember::where('research_proposals_id', $id)->delete();

        return redirect()->route('admin.research-proposals.index')
            ->with('success', 'Berhasil menghapus data Pengajuan Penelitian!.');
    }

    public function submit(Request $request)
    {
        $id = $request->id;

        $researchProposal = ResearchProposal::find($id);

        if ($researchProposal->application_status == 0) {
            $researchProposal->application_status    = 1;
        } elseif ($researchProposal->application_status == 1) {
            $researchProposal->application_status    = 0;
        }

        $researchProposal->update();

        return redirect()->back()->with('success', 'Berhasil ajukan penelitian, silahkan menunggu verifikasi dari LPPM!');
    }
    public function approve(Request $request)
    {
        $id = $request->id;

        $researchProposal = ResearchProposal::find($id);

        if ($researchProposal->application_status == 3) {
            $researchProposal->application_status    = 1;
        } else {
            $researchProposal->application_status    = 3;
        }

        $researchProposal->update();

        return redirect()->back()->with('success', 'Berhasil perbarui status penelitian!');
    }

    public function revise(Request $request)
    {
        $id = $request->id;

        $researchProposal = ResearchProposal::find($id);

        $researchProposal->application_status    = 2;

        $researchProposal->update();

        return redirect()->back()->with('success', 'Berhasil perbarui status penelitian!');
    }

    public function approveContract(Request $request)
    {
        $id = $request->id;

        $researchProposal = ResearchProposal::find($id);

        $researchProposal->contract_status    = 1;

        $researchProposal->update();

        return redirect()->back()->with('success', 'Berhasil perbarui status penelitian!');
    }
}
