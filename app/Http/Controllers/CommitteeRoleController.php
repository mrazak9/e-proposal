<?php

namespace App\Http\Controllers;

use App\Models\CommitteeRole;
use Illuminate\Http\Request;

/**
 * Class CommitteeRoleController
 * @package App\Http\Controllers
 */
class CommitteeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committeeRoles = CommitteeRole::paginate();

        return view('committee-role.index', compact('committeeRoles'))
            ->with('i', (request()->input('page', 1) - 1) * $committeeRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $committeeRole = new CommitteeRole();
        return view('committee-role.create', compact('committeeRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CommitteeRole::$rules);

        $committeeRole = CommitteeRole::create($request->all());

        return redirect()->route('admin.committee-roles.index')
            ->with('success', 'CommitteeRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $committeeRole = CommitteeRole::find($id);

        return view('committee-role.show', compact('committeeRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $committeeRole = CommitteeRole::find($id);

        return view('committee-role.edit', compact('committeeRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CommitteeRole $committeeRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommitteeRole $committeeRole)
    {
        request()->validate(CommitteeRole::$rules);

        $committeeRole->update($request->all());

        return redirect()->route('admin.committee-roles.index')
            ->with('success', 'CommitteeRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $committeeRole = CommitteeRole::find($id)->delete();

        return redirect()->route('admin.committee-roles.index')
            ->with('success', 'CommitteeRole deleted successfully');
    }
}
