<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposalRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ResearchProposalRevisionController
 * @package App\Http\Controllers
 */
class ResearchProposalRevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchProposalRevisions = ResearchProposalRevision::paginate();

        return view('research-proposal-revision.index', compact('researchProposalRevisions'))
            ->with('i', (request()->input('page', 1) - 1) * $researchProposalRevisions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchProposalRevision = new ResearchProposalRevision();
        return view('research-proposal-revision.create', compact('researchProposalRevision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ResearchProposalRevision::$rules);
        $research_proposals_id  = $request->research_proposals_id;
        $user_id                = Auth::user()->id;
        $revision               = $request->revision;
        $isDone                 = 0;

        $researchProposalRevision = ResearchProposalRevision::create([
            'research_proposals_id'     => $research_proposals_id,
            'user_id'                   => $user_id,
            'revision'                  => $revision,
            'isDone'                    => $isDone,
            'created_at'                => now(),
        ]);

        return redirect()->back()
            ->with('success', 'ResearchProposalRevision created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchProposalRevision = ResearchProposalRevision::find($id);

        return view('research-proposal-revision.show', compact('researchProposalRevision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researchProposalRevision = ResearchProposalRevision::find($id);

        return view('research-proposal-revision.edit', compact('researchProposalRevision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ResearchProposalRevision $researchProposalRevision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchProposalRevision $researchProposalRevision)
    {
        request()->validate(ResearchProposalRevision::$rules);

        $researchProposalRevision->update($request->all());

        return redirect()->route('admin.research-proposal-revisions.index')
            ->with('success', 'ResearchProposalRevision updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $researchProposalRevision = ResearchProposalRevision::find($id)->delete();
         
        return redirect()->back()->with('success', 'Revisi berhasil dihapus!');
    }

    public function updateStatus(Request $request)
    {
        $status = $request->status;
        $revision_id = $request->revision;
        
        $researchProposalRevision = ResearchProposalRevision::find($revision_id);

        $researchProposalRevision->update(
            ['isDone' => $status]            
        );

        return redirect()->back()
        ->with('success', 'Berhasil perbarui status revisi!');
    }
}
