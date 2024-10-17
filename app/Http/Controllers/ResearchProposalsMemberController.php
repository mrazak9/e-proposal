<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposalsMember;
use Illuminate\Http\Request;

/**
 * Class ResearchProposalsMemberController
 * @package App\Http\Controllers
 */
class ResearchProposalsMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchProposalsMembers = ResearchProposalsMember::paginate();

        return view('research-proposals-member.index', compact('researchProposalsMembers'))
            ->with('i', (request()->input('page', 1) - 1) * $researchProposalsMembers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchProposalsMember = new ResearchProposalsMember();
        return view('research-proposals-member.create', compact('researchProposalsMember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ResearchProposalsMember::$rules);

        $researchProposalsMember = ResearchProposalsMember::create($request->all());

        return redirect()->route('research-proposals-members.index')
            ->with('success', 'ResearchProposalsMember created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchProposalsMember = ResearchProposalsMember::find($id);

        return view('research-proposals-member.show', compact('researchProposalsMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researchProposalsMember = ResearchProposalsMember::find($id);

        return view('research-proposals-member.edit', compact('researchProposalsMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ResearchProposalsMember $researchProposalsMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchProposalsMember $researchProposalsMember)
    {
        request()->validate(ResearchProposalsMember::$rules);

        $researchProposalsMember->update($request->all());

        return redirect()->route('research-proposals-members.index')
            ->with('success', 'ResearchProposalsMember updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $researchProposalsMember = ResearchProposalsMember::find($id)->delete();

        return redirect()->route('research-proposals-members.index')
            ->with('success', 'ResearchProposalsMember deleted successfully');
    }
}
