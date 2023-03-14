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

        $isExist = Dop::select('attachment')->where('organization_id', $getOrgId)->where('attachment', NULL)->count();

        $dops      = Dop::orderBy('created_at', 'DESC')->paginate(6);

        return view(
            'dop.index',
            compact(
                'dops',
                'orgName',
                'isExist'
            )
        )
            ->with('i', (request()->input('page', 1) - 1) * $dops->perPage());
    }
    public function process()
    {
        $dops      = Dop::orderBy('created_at', 'DESC')->paginate(10);

        return view(
            'dop.process',
            compact(
                'dops'
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
        $user_id    = Auth::user()->id;
        $getOrgId   = Auth::User()->student->organization_id;

        $dop        = Dop::create([
            'user_id'           => $user_id,
            'organization_id'   => $getOrgId,
            'amount'            => $request->amount,
            'note'              => $request->note,
            'isApproved'        => 0,
            'attachment'        => null,
        ]);

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
    public function update(Request $request, $id)
    {
        $id                     = Crypt::decrypt($id);

        $dop                    = Dop::find($id);
        $dop->attachment        = $request->attachment;
        $dop->update();

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
        $id = Crypt::decrypt($id);
        $dop = Dop::find($id)->delete();

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop deleted successfully');
    }
}
