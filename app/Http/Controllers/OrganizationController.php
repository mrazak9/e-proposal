<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Class OrganizationController
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $organizations = Organization::paginate();

        return view('organization.index', compact('organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $organizations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $organization = new Organization();
        return view('organization.create', compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        request()->validate(Organization::$rules);

        $organization = Organization::create($request->all());

        return redirect()->route('admin.organizations.index')
            ->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $organization = Organization::find($id);

        return view('organization.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $organization = Organization::find($id);

        return view('organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Organization $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        request()->validate(Organization::$rules);

        $organization->update($request->all());

        return redirect()->route('admin.organizations.index')
            ->with('success', 'Organization updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $organization = Organization::find($id)->delete();

        return redirect()->route('admin.organizations.index')
            ->with('success', 'Organization deleted successfully');
    }
}
