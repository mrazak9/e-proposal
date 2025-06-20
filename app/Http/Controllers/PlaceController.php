<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Class PlaceController
 * @package App\Http\Controllers
 */
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $places = Place::paginate();

        return view('place.index', compact('places'))
            ->with('i', (request()->input('page', 1) - 1) * $places->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $place = new Place();
        return view('place.create', compact('place'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        request()->validate(Place::$rules);

        $place = Place::create($request->all());

        return redirect()->route('admin.places.index')
            ->with('success', 'Place created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $place = Place::find($id);

        return view('place.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $place = Place::find($id);

        return view('place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Place $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        request()->validate(Place::$rules);

        $place->update($request->all());

        return redirect()->route('admin.places.index')
            ->with('success', 'Place updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $place = Place::find($id)->delete();

        return redirect()->route('admin.places.index')
            ->with('success', 'Place deleted successfully');
    }
}
