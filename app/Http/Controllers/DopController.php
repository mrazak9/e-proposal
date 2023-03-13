<?php

namespace App\Http\Controllers;

use App\Models\Dop;
use Illuminate\Http\Request;

/**
 * Class DopController
 * @package App\Http\Controllers
 */
class DopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dops = Dop::paginate();

        return view('dop.index', compact('dops'))
            ->with('i', (request()->input('page', 1) - 1) * $dops->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dop = new Dop();
        return view('dop.create', compact('dop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dop::$rules);

        $dop = Dop::create($request->all());

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dop = Dop::find($id);

        return view('dop.show', compact('dop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dop = Dop::find($id);

        return view('dop.edit', compact('dop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dop $dop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dop $dop)
    {
        request()->validate(Dop::$rules);

        $dop->update($request->all());

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dop = Dop::find($id)->delete();

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop deleted successfully');
    }
}
