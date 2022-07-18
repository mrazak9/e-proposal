<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

/**
 * Class ApprovalController
 * @package App\Http\Controllers
 */
class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvals = Approval::paginate();

        return view('approval.index', compact('approvals'))
            ->with('i', (request()->input('page', 1) - 1) * $approvals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $approval = new Approval();
        return view('approval.create', compact('approval'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Approval::$rules);

        $approval = Approval::create($request->all());

        return redirect()->route('approvals.index')
            ->with('success', 'Approval created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $approval = Approval::find($id);

        return view('approval.show', compact('approval'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $approval = Approval::find($id);

        return view('approval.edit', compact('approval'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Approval $approval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approval $approval)
    {
        request()->validate(Approval::$rules);

        $approval->update($request->all());

        return redirect()->route('approvals.index')
            ->with('success', 'Approval updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $approval = Approval::find($id)->delete();

        return redirect()->route('approvals.index')
            ->with('success', 'Approval deleted successfully');
    }
}
