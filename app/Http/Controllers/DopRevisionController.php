<?php

namespace App\Http\Controllers;

use App\Models\DopRevision;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class DopRevisionController
 * @package App\Http\Controllers
 */
class DopRevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dopRevisions = DopRevision::paginate();

        return view('dop-revision.index', compact('dopRevisions'))
            ->with('i', (request()->input('page', 1) - 1) * $dopRevisions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dopRevision = new DopRevision();
        return view('dop-revision.create', compact('dopRevision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id        = Auth::User()->id;
        $dop_id         = $request->dop_id;
        $revision       = $request->revision;

        $dopRevisions        = DopRevision::create([
            'dop_id'            => $dop_id,
            'user_id'           => $user_id,
            'revision'           => $revision,
        ]);

        return redirect()->back()
            ->with('success', 'Revisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dopRevision = DopRevision::find($id);

        return view('dop-revision.show', compact('dopRevision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dopRevision = DopRevision::find($id);

        return view('dop-revision.edit', compact('dopRevision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DopRevision $dopRevision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DopRevision $dopRevision)
    {
        request()->validate(DopRevision::$rules);

        $dopRevision->update($request->all());

        return redirect()->route('dop-revisions.index')
            ->with('success', 'DopRevision updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dopRevision = DopRevision::find($id)->delete();

        return redirect()->back()
            ->with('danger', 'Revisi berhasil dihapus');
    }
    public function deleteComment($id)
    {
        $dopRevision = DopRevision::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Revisi berhasil dihapus');
    }
}
