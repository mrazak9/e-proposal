<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposalMember;
use Illuminate\Http\Request;

/**
 * Class DedicationProposalMemberController
 * @package App\Http\Controllers
 */
class DedicationProposalMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dedicationProposalMembers = DedicationProposalMember::paginate();

        return view('dedication-proposal-member.index', compact('dedicationProposalMembers'))
            ->with('i', (request()->input('page', 1) - 1) * $dedicationProposalMembers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dedicationProposalMember = new DedicationProposalMember();
        return view('dedication-proposal-member.create', compact('dedicationProposalMember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DedicationProposalMember::$rules);

        $dedicationProposalMember = DedicationProposalMember::create($request->all());

        return redirect()->route('dedication-proposal-members.index')
            ->with('success', 'DedicationProposalMember created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dedicationProposalMember = DedicationProposalMember::find($id);

        return view('dedication-proposal-member.show', compact('dedicationProposalMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dedicationProposalMember = DedicationProposalMember::find($id);

        return view('dedication-proposal-member.edit', compact('dedicationProposalMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DedicationProposalMember $dedicationProposalMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DedicationProposalMember $dedicationProposalMember)
    {
        request()->validate(DedicationProposalMember::$rules);

        $dedicationProposalMember->update($request->all());

        return redirect()->route('dedication-proposal-members.index')
            ->with('success', 'DedicationProposalMember updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dedicationProposalMember = DedicationProposalMember::find($id)->delete();

        return redirect()->route('dedication-proposal-members.index')
            ->with('success', 'DedicationProposalMember deleted successfully');
    }
}
