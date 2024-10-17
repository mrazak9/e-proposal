<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposal;
use Illuminate\Http\Request;

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
        $researchProposals = ResearchProposal::paginate();

        return view('research-proposal.index', compact('researchProposals'))
            ->with('i', (request()->input('page', 1) - 1) * $researchProposals->perPage());
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
        $name = $data["name"]; 
        return $data;
        request()->validate(ResearchProposal::$rules);

        $researchProposal = ResearchProposal::create($request->all());

        return redirect()->route('admin.research-proposals.index')
            ->with('success', 'ResearchProposal created successfully.');
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
            ->with('success', 'ResearchProposal updated successfully');
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
