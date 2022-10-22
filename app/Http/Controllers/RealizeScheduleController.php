<?php

namespace App\Http\Controllers;

use App\Models\RealizeSchedule;
use Illuminate\Http\Request;

/**
 * Class RealizeScheduleController
 * @package App\Http\Controllers
 */
class RealizeScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realizeSchedules = RealizeSchedule::paginate();

        return view('realize-schedule.index', compact('realizeSchedules'))
            ->with('i', (request()->input('page', 1) - 1) * $realizeSchedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realizeSchedule = new RealizeSchedule();
        return view('realize-schedule.create', compact('realizeSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RealizeSchedule::$rules);

        $realizeSchedule = RealizeSchedule::create($request->all());

        return redirect()->route('realize-schedules.index')
            ->with('success', 'RealizeSchedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realizeSchedule = RealizeSchedule::find($id);

        return view('realize-schedule.show', compact('realizeSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realizeSchedule = RealizeSchedule::find($id);

        return view('realize-schedule.edit', compact('realizeSchedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RealizeSchedule $realizeSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealizeSchedule $realizeSchedule)
    {
        request()->validate(RealizeSchedule::$rules);

        $realizeSchedule->update($request->all());

        return redirect()->route('realize-schedules.index')
            ->with('success', 'RealizeSchedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizeSchedule = RealizeSchedule::find($id)->delete();

        return redirect()->route('realize-schedules.index')
            ->with('success', 'RealizeSchedule deleted successfully');
    }
}
