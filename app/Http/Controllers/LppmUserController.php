<?php

namespace App\Http\Controllers;

use App\Models\LppmUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LppmUserController
 * @package App\Http\Controllers
 */
class LppmUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lppmUsers = LppmUser::paginate();

        return view('lppm-user.index', compact('lppmUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $lppmUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lppmUser = new LppmUser();
        return view('lppm-user.create', compact('lppmUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return $request->all();
       $user_id = Auth::User()->id;

        request()->validate(LppmUser::$rules);

        $lppmUser = LppmUser::create($request->all());

        return redirect()->route('admin.lppm-users.index')
            ->with('success', 'LppmUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lppmUser = LppmUser::find($id);

        return view('lppm-user.show', compact('lppmUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lppmUser = LppmUser::find($id);

        return view('lppm-user.edit', compact('lppmUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LppmUser $lppmUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LppmUser $lppmUser)
    {
        request()->validate(LppmUser::$rules);

        $lppmUser->update($request->all());

        return redirect()->route('admin.lppm-users.index')
            ->with('success', 'LppmUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lppmUser = LppmUser::find($id)->delete();

        return redirect()->route('admin.lppm-users.index')
            ->with('success', 'LppmUser deleted successfully');
    }
}
