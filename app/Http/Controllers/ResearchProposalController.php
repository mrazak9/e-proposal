<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposal;
use App\Models\ResearchProposalsMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $researchProposals = ResearchProposal::latest()->get();

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
        $name                   = $data["name"]; 
        $identity_number        = $data["identity_number"]; 
        $affiliation            = $data["affiliation"]; 

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

        if ($name) {
            foreach ($name  as $key => $value) {
                $research_proposals_members                         = new ResearchProposalsMember();
                $research_proposals_members->research_proposals_id  = $researchProposal["id"];
                $research_proposals_members->name                   = $name[$key];
                $research_proposals_members->identity_number        = $identity_number[$key];
                $research_proposals_members->affiliation            = $affiliation[$key];
                $research_proposals_members->created_at             = now();
                $research_proposals_members->save();
            }
        }

        return redirect()->route('admin.research-proposals.index')
            ->with('success', 'Pengajuan berhasil dibuat, silahkan lengkapi Proposal Pengajuan Penelitian!.');
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
        request()->validate(ResearchProposal::$rules);

        $researchProposal->update($request->all());

        return redirect()->route('admin.research-proposals.index')
            ->with('success', 'Pengajuan berhasil diperbarui!.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $researchProposal = ResearchProposal::find($id)->delete();

        return redirect()->route('admin.research-proposals.index')
            ->with('success', 'ResearchProposal deleted successfully');
    }
}
