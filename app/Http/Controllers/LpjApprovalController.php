<?php

namespace App\Http\Controllers;

use App\Models\LpjApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class LpjApprovalController
 * @package App\Http\Controllers
 */
class LpjApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lpjApprovals = LpjApproval::paginate();

        return view('lpj-approval.index', compact('lpjApprovals'))
            ->with('i', (request()->input('page', 1) - 1) * $lpjApprovals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lpjApproval = new LpjApproval();
        return view('lpj-approval.create', compact('lpjApproval'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LpjApproval::$rules);

        $lpjApproval = LpjApproval::create($request->all());

        return redirect()->route('lpj-approvals.index')
            ->with('success', 'LpjApproval created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lpjApproval = LpjApproval::find($id);

        return view('lpj-approval.show', compact('lpjApproval'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lpjApproval = LpjApproval::find($id);

        return view('lpj-approval.edit', compact('lpjApproval'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LpjApproval $lpjApproval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LpjApproval $lpjApproval)
    {
        request()->validate(LpjApproval::$rules);

        $lpjApproval->update($request->all());

        return redirect()->route('lpj-approvals.index')
            ->with('success', 'LpjApproval updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lpjApproval = LpjApproval::find($id)->delete();

        return redirect()->route('lpj-approvals.index')
            ->with('success', 'LpjApproval deleted successfully');
    }
}
