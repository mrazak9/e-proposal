<?php

namespace App\Http\Controllers;

use App\Models\LpjRevision;
use Illuminate\Http\Request;

/**
 * Class LpjRevisionController
 * @package App\Http\Controllers
 */
class LpjRevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lpjRevisions = LpjRevision::paginate();

        return view('lpj-revision.index', compact('lpjRevisions'))
            ->with('i', (request()->input('page', 1) - 1) * $lpjRevisions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lpjRevision = new LpjRevision();
        return view('lpj-revision.create', compact('lpjRevision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LpjRevision::$rules);

        $lpjRevision = LpjRevision::create($request->all());

        return redirect()->route('lpj-revisions.index')
            ->with('success', 'LpjRevision created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lpjRevision = LpjRevision::find($id);

        return view('lpj-revision.show', compact('lpjRevision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lpjRevision = LpjRevision::find($id);

        return view('lpj-revision.edit', compact('lpjRevision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LpjRevision $lpjRevision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LpjRevision $lpjRevision)
    {
        request()->validate(LpjRevision::$rules);

        $lpjRevision->update($request->all());

        return redirect()->route('lpj-revisions.index')
            ->with('success', 'LpjRevision updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        $lpj_id = $request->lpj_id;

        $lpj_revision = LpjRevision::find($id)->delete();
        return back()->with('warning', 'Revisi telah dihapus');
    }
}
