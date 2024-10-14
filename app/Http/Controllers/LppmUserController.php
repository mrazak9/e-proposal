<?php

namespace App\Http\Controllers;

use App\Models\Department;
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
        $lppmUser       = new LppmUser();
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
        request()->validate(LppmUser::$rules);

        $user_id            = Auth::User()->id;
        $status             = $request->status;
        $nidn               = $request->nidn;
        $affiliation        = $request->affiliation;
        $academic_grade_id  = $request->academic_grade_id;
        $group_of_work_id   = $request->group_of_work_id;
        $nik                = $request->nik;
        $google_scholar_url = $request->google_scholar_url;
        $scopus_id          = $request->scopus_id;
        $department_id      = $request->department_id;
        $handphone          = $request->handphone;
        $place_of_birth     = $request->place_of_birth;
        $date_of_birth      = $request->date_of_birth;

        $lppmUser = LppmUser::create(
            [
                'user_id'               => $user_id,
                'status'                => $status,
                'nidn'                  => $nidn,
                'affiliation'           => $affiliation,
                'academic_grade_id'     => $academic_grade_id,
                'group_of_work_id'      => $group_of_work_id,
                'nik'                   => $nik,
                'google_scholar_url'    => $google_scholar_url,
                'scopus_id'             => $scopus_id,
                'department_id'         => $department_id,
                'handphone'             => $handphone,
                'place_of_birth'        => $place_of_birth,
                'date_of_birth'         => $date_of_birth,

            ]

        );

        return redirect()->route('admin.home')
            ->with('success', 'Berhasil perbarui profil pengguna.');
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

    public function lppmProfile()
    {
        $id = Auth::id(); // Get the authenticated user's ID

        // Check if the user has a specific role and if their profile doesn't exist
        if (Auth::user()->hasAnyRole(['KETUA_PENELITIAN', 'ANGGOTA_PENELITIAN']) && LppmUser::where('user_id', $id)->doesntExist()) {
            $departments = Department::orderBy('name', 'ASC')->pluck('id', 'name');
            return view('lppm-user.create', compact('departments'));
        }

        $profile = LppmUser::where('user_id', $id)->first();

        return view('lppm-user.profile', compact('profile'));
    }
}
