<?php

namespace App\Http\Controllers;

use App\Models\ResearchProposalSchedule;
use Illuminate\Http\Request;

/**
 * Class ResearchProposalScheduleController
 * @package App\Http\Controllers
 */
class ResearchProposalScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchProposalSchedules = ResearchProposalSchedule::paginate();

        return view('research-proposal-schedule.index', compact('researchProposalSchedules'))
            ->with('i', (request()->input('page', 1) - 1) * $researchProposalSchedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchProposalSchedule = new ResearchProposalSchedule();
        return view('research-proposal-schedule.create', compact('researchProposalSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ResearchProposalSchedule::$rules);

        $researchProposalSchedule = ResearchProposalSchedule::create($request->all());

        return redirect()->route('research-proposal-schedules.index')
            ->with('success', 'ResearchProposalSchedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $researchProposalSchedule = ResearchProposalSchedule::find($id);

        return view('research-proposal-schedule.show', compact('researchProposalSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $researchProposalSchedule = ResearchProposalSchedule::find($id);

        return view('research-proposal-schedule.edit', compact('researchProposalSchedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ResearchProposalSchedule $researchProposalSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchProposalSchedule $researchProposalSchedule)
    {
        request()->validate(ResearchProposalSchedule::$rules);

        $researchProposalSchedule->update($request->all());

        return redirect()->route('research-proposal-schedules.index')
            ->with('success', 'ResearchProposalSchedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $researchProposalSchedule = ResearchProposalSchedule::find($id)->delete();

        return redirect()->route('research-proposal-schedules.index')
            ->with('success', 'ResearchProposalSchedule deleted successfully');
    }
}
