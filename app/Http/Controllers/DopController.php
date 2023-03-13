<?php

namespace App\Http\Controllers;

use App\Models\Dop;
use App\Models\Organization;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        $getOrgId   = Auth::User()->student->organization_id;
        $getOrgName = Organization::select('singkatan')->where('id', $getOrgId)->first();
        $orgName    = $getOrgName->singkatan;

        $dops      = Dop::paginate();

        return view(
            'dop.index',
            compact(
                'dops',
                'orgName'
            )
        )
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
        Crypt::decrypt($id);
        $dop = Dop::find($id)->delete();

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop deleted successfully');
    }
}
