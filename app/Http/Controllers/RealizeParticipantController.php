<?php

namespace App\Http\Controllers;

use App\Models\RealizeParticipant;
use Illuminate\Http\Request;

/**
 * Class RealizeParticipantController
 * @package App\Http\Controllers
 */
class RealizeParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realizeParticipants = RealizeParticipant::paginate();

        return view('realize-participant.index', compact('realizeParticipants'))
            ->with('i', (request()->input('page', 1) - 1) * $realizeParticipants->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realizeParticipant = new RealizeParticipant();
        return view('realize-participant.create', compact('realizeParticipant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RealizeParticipant::$rules);

        $realizeParticipant = RealizeParticipant::create($request->all());

        return redirect()->route('realize-participants.index')
            ->with('success', 'RealizeParticipant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realizeParticipant = RealizeParticipant::find($id);

        return view('realize-participant.show', compact('realizeParticipant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realizeParticipant = RealizeParticipant::find($id);

        return view('realize-participant.edit', compact('realizeParticipant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RealizeParticipant $realizeParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealizeParticipant $realizeParticipant)
    {
        request()->validate(RealizeParticipant::$rules);

        $realizeParticipant->update($request->all());

        return redirect()->route('realize-participants.index')
            ->with('success', 'RealizeParticipant updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizeParticipant = RealizeParticipant::find($id)->delete();

        return redirect()->route('realize-participants.index')
            ->with('success', 'RealizeParticipant deleted successfully');
    }
}
