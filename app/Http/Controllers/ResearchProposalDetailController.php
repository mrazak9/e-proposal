<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposalDetail;
use Illuminate\Http\Request;

/**
 * Class ResearchProposalDetailController
 * @package App\Http\Controllers
 */
class ResearchProposalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchProposalDetails = ResearchProposalDetail::paginate();

        return view('research-proposal-detail.index', compact('researchProposalDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $researchProposalDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchProposalDetail = new ResearchProposalDetail();
        return view('research-proposal-detail.create', compact('researchProposalDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ResearchProposalDetail::$rules);

        $researchProposalDetail = ResearchProposalDetail::create($request->all());

        return redirect()->route('research-proposal-details.index')
            ->with('success', 'ResearchProposalDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchProposalDetail = ResearchProposalDetail::find($id);

        return view('research-proposal-detail.show', compact('researchProposalDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researchProposalDetail = ResearchProposalDetail::find($id);

        return view('research-proposal-detail.edit', compact('researchProposalDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ResearchProposalDetail $researchProposalDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchProposalDetail $researchProposalDetail)
    {
        request()->validate(ResearchProposalDetail::$rules);

        $researchProposalDetail->update($request->all());

        return redirect()->route('research-proposal-details.index')
            ->with('success', 'ResearchProposalDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $researchProposalDetail = ResearchProposalDetail::find($id)->delete();

        return redirect()->route('research-proposal-details.index')
            ->with('success', 'ResearchProposalDetail deleted successfully');
    }
}
