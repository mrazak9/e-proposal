<?php

namespace App\Http\Controllers;

use App\Models\Lpj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class LpjController
 * @package App\Http\Controllers
 */
class LpjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lpjs = Lpj::paginate();

        return view('lpj.index', compact('lpjs'))
            ->with('i', (request()->input('page', 1) - 1) * $lpjs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lpj = new Lpj();
        return view('lpj.create', compact('lpj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lpj::$rules);

        $lpj = Lpj::create($request->all());

        return redirect()->route('admin.lpjs.index')
            ->with('success', 'Lpj created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lpj = Lpj::find($id);

        return view('lpj.show', compact('lpj'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lpj = Lpj::find($id);

        return view('lpj.edit', compact('lpj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lpj $lpj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lpj $lpj)
    {
        request()->validate(Lpj::$rules);

        $lpj->update($request->all());

        return redirect()->route('admin.lpjs.index')
            ->with('success', 'Lpj updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lpj = Lpj::find($id)->delete();

        return redirect()->route('admin.lpjs.index')
            ->with('success', 'Lpj deleted successfully');
    }

    public function finalize($id)
    {
        $id = Crypt::decrypt($id);
        $proposal_id = $id;

        return view('lpj.finalize', compact('proposal_id'));
    }
}
