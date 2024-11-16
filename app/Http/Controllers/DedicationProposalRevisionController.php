<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposalRevision;
use Illuminate\Http\Request;

/**
 * Class DedicationProposalRevisionController
 * @package App\Http\Controllers
 */
class DedicationProposalRevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dedicationProposalRevisions = DedicationProposalRevision::paginate();

        return view('dedication-proposal-revision.index', compact('dedicationProposalRevisions'))
            ->with('i', (request()->input('page', 1) - 1) * $dedicationProposalRevisions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dedicationProposalRevision = new DedicationProposalRevision();
        return view('dedication-proposal-revision.create', compact('dedicationProposalRevision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DedicationProposalRevision::$rules);

        $dedicationProposalRevision = DedicationProposalRevision::create($request->all());

        return redirect()->route('dedication-proposal-revisions.index')
            ->with('success', 'DedicationProposalRevision created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dedicationProposalRevision = DedicationProposalRevision::find($id);

        return view('dedication-proposal-revision.show', compact('dedicationProposalRevision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dedicationProposalRevision = DedicationProposalRevision::find($id);

        return view('dedication-proposal-revision.edit', compact('dedicationProposalRevision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DedicationProposalRevision $dedicationProposalRevision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DedicationProposalRevision $dedicationProposalRevision)
    {
        request()->validate(DedicationProposalRevision::$rules);

        $dedicationProposalRevision->update($request->all());

        return redirect()->route('dedication-proposal-revisions.index')
            ->with('success', 'DedicationProposalRevision updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dedicationProposalRevision = DedicationProposalRevision::find($id)->delete();

        return redirect()->route('dedication-proposal-revisions.index')
            ->with('success', 'DedicationProposalRevision deleted successfully');
    }
}
