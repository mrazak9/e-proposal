<?php

namespace App\Http\Controllers;

use App\Models\PlanningSchedule;
use Illuminate\Http\Request;

/**
 * Class PlanningScheduleController
 * @package App\Http\Controllers
 */
class PlanningScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planningSchedules = PlanningSchedule::paginate();

        return view('planning-schedule.index', compact('planningSchedules'))
            ->with('i', (request()->input('page', 1) - 1) * $planningSchedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planningSchedule = new PlanningSchedule();
        return view('planning-schedule.create', compact('planningSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PlanningSchedule::$rules);

        $planningSchedule = PlanningSchedule::create($request->all());

        return redirect()->route('planning-schedules.index')
            ->with('success', 'PlanningSchedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planningSchedule = PlanningSchedule::find($id);

        return view('planning-schedule.show', compact('planningSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planningSchedule = PlanningSchedule::find($id);

        return view('planning-schedule.edit', compact('planningSchedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlanningSchedule $planningSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanningSchedule $planningSchedule)
    {
        request()->validate(PlanningSchedule::$rules);

        $planningSchedule->update($request->all());

        return redirect()->route('planning-schedules.index')
            ->with('success', 'PlanningSchedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $planningSchedule = PlanningSchedule::find($id)->delete();

        return redirect()->route('planning-schedules.index')
            ->with('success', 'PlanningSchedule deleted successfully');
    }
}
