<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

/**
 * Class ProposalController
 * @package App\Http\Controllers
 */
class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::paginate();

        return view('proposal.index', compact('proposals'))
            ->with('i', (request()->input('page', 1) - 1) * $proposals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proposal = new Proposal();
        return view('proposal.create', compact('proposal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proposal::$rules);

        $proposal = Proposal::create($request->all());

        return redirect()->route('proposals.index')
            ->with('success', 'Proposal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::find($id);

        return view('proposal.show', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);

        return view('proposal.edit', compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proposal $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        request()->validate(Proposal::$rules);

        $proposal->update($request->all());

        return redirect()->route('proposals.index')
            ->with('success', 'Proposal updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proposal = Proposal::find($id)->delete();

        return redirect()->route('proposals.index')
            ->with('success', 'Proposal deleted successfully');
    }
}
