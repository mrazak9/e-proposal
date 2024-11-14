<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposal;
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
        request()->validate(DedicationProposal::$rules);

        $dedicationProposal = DedicationProposal::create($request->all());

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
