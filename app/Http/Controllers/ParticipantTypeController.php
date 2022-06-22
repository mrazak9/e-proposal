<?php

namespace App\Http\Controllers;

use App\Models\ParticipantType;
use Illuminate\Http\Request;

/**
 * Class ParticipantTypeController
 * @package App\Http\Controllers
 */
class ParticipantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantTypes = ParticipantType::paginate();

        return view('participant-type.index', compact('participantTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $participantTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participantType = new ParticipantType();
        return view('participant-type.create', compact('participantType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ParticipantType::$rules);

        $participantType = ParticipantType::create($request->all());

        return redirect()->route('admin.participant_type.index')
            ->with('success', 'ParticipantType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participantType = ParticipantType::find($id);

        return view('participant-type.show', compact('participantType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participantType = ParticipantType::find($id);

        return view('participant-type.edit', compact('participantType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ParticipantType $participantType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParticipantType $participantType)
    {
        request()->validate(ParticipantType::$rules);

        $participantType->update($request->all());

        return redirect()->route('admin.participant_type.index')
            ->with('success', 'ParticipantType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $participantType = ParticipantType::find($id)->delete();

        return redirect()->route('admin.participant_type.index')
            ->with('success', 'ParticipantType deleted successfully');
    }
}
