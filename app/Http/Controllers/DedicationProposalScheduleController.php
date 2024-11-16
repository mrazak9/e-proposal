<?php

namespace App\Http\Controllers;

use App\Models\DedicationProposalSchedule;
use Illuminate\Http\Request;

/**
 * Class DedicationProposalScheduleController
 * @package App\Http\Controllers
 */
class DedicationProposalScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dedicationProposalSchedules = DedicationProposalSchedule::paginate();

        return view('dedication-proposal-schedule.index', compact('dedicationProposalSchedules'))
            ->with('i', (request()->input('page', 1) - 1) * $dedicationProposalSchedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dedicationProposalSchedule = new DedicationProposalSchedule();
        return view('dedication-proposal-schedule.create', compact('dedicationProposalSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DedicationProposalSchedule::$rules);

        $dedicationProposalSchedule = DedicationProposalSchedule::create($request->all());

        return redirect()->route('dedication-proposal-schedules.index')
            ->with('success', 'DedicationProposalSchedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dedicationProposalSchedule = DedicationProposalSchedule::find($id);

        return view('dedication-proposal-schedule.show', compact('dedicationProposalSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dedicationProposalSchedule = DedicationProposalSchedule::find($id);

        return view('dedication-proposal-schedule.edit', compact('dedicationProposalSchedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DedicationProposalSchedule $dedicationProposalSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DedicationProposalSchedule $dedicationProposalSchedule)
    {
        request()->validate(DedicationProposalSchedule::$rules);

        $dedicationProposalSchedule->update($request->all());

        return redirect()->route('dedication-proposal-schedules.index')
            ->with('success', 'DedicationProposalSchedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dedicationProposalSchedule = DedicationProposalSchedule::find($id)->delete();

        return redirect()->route('dedication-proposal-schedules.index')
            ->with('success', 'DedicationProposalSchedule deleted successfully');
    }
}
