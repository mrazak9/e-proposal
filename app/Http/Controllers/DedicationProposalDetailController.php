<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposalDetail;
use Illuminate\Http\Request;

/**
 * Class DedicationProposalDetailController
 * @package App\Http\Controllers
 */
class DedicationProposalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dedicationProposalDetails = DedicationProposalDetail::paginate();

        return view('dedication-proposal-detail.index', compact('dedicationProposalDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $dedicationProposalDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dedicationProposalDetail = new DedicationProposalDetail();
        return view('dedication-proposal-detail.create', compact('dedicationProposalDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DedicationProposalDetail::$rules);

        $dedicationProposalDetail = DedicationProposalDetail::create($request->all());

        return redirect()->route('dedication-proposal-details.index')
            ->with('success', 'DedicationProposalDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dedicationProposalDetail = DedicationProposalDetail::find($id);

        return view('dedication-proposal-detail.show', compact('dedicationProposalDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dedicationProposalDetail = DedicationProposalDetail::find($id);

        return view('dedication-proposal-detail.edit', compact('dedicationProposalDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DedicationProposalDetail $dedicationProposalDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DedicationProposalDetail $dedicationProposalDetail)
    {
        request()->validate(DedicationProposalDetail::$rules);

        $dedicationProposalDetail->update($request->all());

        return redirect()->route('dedication-proposal-details.index')
            ->with('success', 'DedicationProposalDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dedicationProposalDetail = DedicationProposalDetail::find($id)->delete();

        return redirect()->route('dedication-proposal-details.index')
            ->with('success', 'DedicationProposalDetail deleted successfully');
    }
}
