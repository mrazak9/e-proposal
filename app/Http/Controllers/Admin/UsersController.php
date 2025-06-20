<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }

        $users = User::orderBy('name', 'ASC')->paginate(10);

        return view('admin.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }
    public function search(Request $request)
    {
        $cari = $request->search;

        $users = User::where('name', 'like', "%" . $cari . "%")->orderBy('name', 'ASC')->paginate(10);

        return view('admin.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }
        $roles = Role::orderBy('name', 'ASC')->get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }
        $roles = Role::orderBy('name', 'ASC')->get()->pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }

        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function suggest(Request $request)
    {
        $query = $request->input('q');

        $suggestions = User::select('name')
            ->doesnthave('employee')
            ->where('name', 'LIKE', "%$query%")
            ->orderBy('name', 'ASC')
            ->get()
            ->pluck('name');

        return response()->json($suggestions);
    }
}
