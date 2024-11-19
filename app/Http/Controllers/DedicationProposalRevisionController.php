<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposalRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //request()->validate(DedicationProposalRevision::$rules);
        $dedication_proposals_id  = $request->dedication_proposals_id;
        $user_id                = Auth::user()->id;
        $revision               = $request->revision;
        $isDone                 = 0;

        $dedicationProposalRevision = DedicationProposalRevision::create([
            'dedication_proposals_id'     => $dedication_proposals_id,
            'user_id'                   => $user_id,
            'revision'                  => $revision,
            'isDone'                    => $isDone,
            'created_at'                => now(),
        ]);

        return redirect()->back()
            ->with('success', 'Revisi berhasil ditambahkan!.');
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

        return redirect()->back()
            ->with('success', 'Revisi berhasil dihapus!');
    }

    public function updateStatus(Request $request)
    {
        $status = $request->status;
        $revision_id = $request->revision;
        
        $dedicationProposalRevision = DedicationProposalRevision::find($revision_id);

        $dedicationProposalRevision->update(
            ['isDone' => $status]            
        );

        return redirect()->back()
        ->with('success', 'Berhasil perbarui status revisi!');
    }
}
