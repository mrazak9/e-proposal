<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Yoeunes\Toastr\Toastr;
use Illuminate\Support\Facades\Gate;

/**
 * Class StudentController
 * @package App\Http\Controllers
 */
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::has('student')->orderBy('name', 'ASC')->paginate(10);
        $users = User::doesntHave('student')->doesntHave('employee')->pluck('id', 'name');
        $organizations = Organization::pluck('id', 'name');
        return view('student.index', compact('students', 'users', 'organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

    public function studentOrganization()
    {
        if (!Gate::allows('VIEW_MEMBER')) {
            return abort(401);
        }
        $getOrgId = Auth::User()->student->organization_id;

        $organizations = Organization::with(['student.user'])
            ->where('id', $getOrgId)
            ->paginate(10);

        return view('student.organization', compact('organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $organizations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        return view('student.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Student::$rules);

        $student = Student::create($request->all());

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $student = Student::where('user_id', $id)->first();
        $users = User::pluck('id', 'name');
        $organizations = Organization::pluck('id', 'name');
        return view('student.edit', compact('student', 'users', 'organizations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //request()->validate(Student::$rules);

        $student->update($request->all());
        $getOrganization = $request->organization_id;
        $getId = Auth::id();
        $user = User::find($getId);

        switch ($getOrganization) {
            case ('1'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMATIK');
                break;
            case ('2'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMAKOMPAK');
                break;
            case ('3'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMAADBIS');
                break;
            case ('4'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_BEM');
                break;
            case ('5'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_BPM');
                break;
            case ('6'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('7'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('8'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('9'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('10'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('11'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('12'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('13'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('14'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('15'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('16'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('17'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('18'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_KSM');
                break;
            case ('19'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_KSM');
                break;
            case ('20'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('21'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case ('22'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMASI');
                break;
        }


        return redirect()->route('admin.home')
            ->with('success', 'Student updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $student = Student::find($id)->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully');
    }

    public function member()
    {
        //Check Roles Login
        if (Auth::user()->hasRole('ADMIN')) {
            $students = User::orderBy('name', 'ASC')
                ->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMATIK')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_HIMATIK')
                    ->orWhere('name', 'PANITIA_HIMATIK')
                    ->orWhere('name', 'BENDAHARA_HIMATIK');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_HIMAADBIS')
                    ->orWhere('name', 'BENDAHARA_HIMAADBIS')
                    ->orWhere('name', 'PANITIA_HIMAADBIS');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_HIMAKOMPAK')
                    ->orWhere('name', 'BENDAHARA_HIMAKOMPAK')
                    ->orWhere('name', 'PANITIA_HIMAKOMPAK');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_KSM')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_KSM')
                    ->orWhere('name', 'BENDAHARA_KSM')
                    ->orWhere('name', 'PANITIA_KSM');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_UKM')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_UKM')
                    ->orWhere('name', 'BENDAHARA_UKM')
                    ->orWhere('name', 'PANITIA_UKM');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_BPM')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_BPM')
                    ->orWhere('name', 'BENDAHARA_BPM')
                    ->orWhere('name', 'PANITIA_BPM');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_BEM')) {
            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_BEM')
                    ->orWhere('name', 'BENDAHARA_BEM')
                    ->orWhere('name', 'PANITIA_BEM');
            })->orderBy('name', 'ASC')->paginate(10);
        }

        return view('student.member', compact('students'))->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

    public function update_akses_member(Request $request)
    {
        $getId = $request->user_id;
        $getPosition = $request->position;

        $students = User::find($getId);

        $students->roles()->detach();
        $students->assignRole($getPosition);

        Toastr()->success('Berhasil update akses anggota');
        return redirect()->route('admin.student.member');
    }

    public function revoke_akses_member($id)
    {
        $id = Crypt::decrypt($id);
        $students = User::find($id);
        $students->roles()->detach();
        $students->assignRole('GUEST');

        Toastr()->success('Berhasil hapus akses posisi');
        return redirect()->route('admin.student.member');
    }
    public function revoke_member($id)
    {
        $id = Crypt::decrypt($id);
        $students = User::find($id);
        $students->roles()->detach();
        $students->assignRole('INACTIVE');

        $students = Student::where('user_id', $id)->delete();

        Toastr()->success('Berhasil hapus keanggotaan organisasi');
        return redirect()->route('admin.student.member');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::doesntHave('student')->doesntHave('employee')->pluck('id', 'name');
        $organizations = Organization::pluck('id', 'name');

        $students = User::has('student')->where('name', 'like', "%{$search}%")->paginate(10);


        return view('student.index', compact('students', 'users', 'organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

    public function search_member(Request $request)
    {
        $search = $request->search;

        //Check Roles Login
        if (Auth::user()->hasRole('ADMIN')) {
            $students = User::where('name', 'LIKE', "%$search%")->orderBy('name', 'ASC')
                ->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMATIK')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_HIMATIK')
                    ->orWhere('name', 'BENDAHARA_HIMATIK')
                    ->orWhere('name', 'PANITIA_HIMATIK');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMAADBIS')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_HIMAADBIS')
                    ->orWhere('name', 'BENDAHARA_HIMAADBIS')
                    ->orWhere('name', 'PANITIA_HIMAADBIS');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_HIMAKOMPAK')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_HIMAKOMPAK')
                    ->orWhere('name', 'BENDAHARA_HIMAKOMPAK')
                    ->orWhere('name', 'PANITIA_HIMAKOMPAK');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_KSM')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_KSM')
                    ->orWhere('name', 'BENDAHARA_KSM')
                    ->orWhere('name', 'PANITIA_KSM');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_UKM')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_UKM')
                    ->orWhere('name', 'BENDAHARA_UKM')
                    ->orWhere('name', 'PANITIA_UKM');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_BPM')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_BPM')
                    ->orWhere('name', 'BENDAHARA_BPM')
                    ->orWhere('name', 'PANITIA_BPM');
            })->orderBy('name', 'ASC')->paginate(10);
        } elseif (Auth::user()->hasRole('KETUA_BEM')) {
            $students = User::where('name', 'LIKE', "%$search%")->whereHas('roles', function ($query) {
                $query->where('name', 'ANGGOTA_BEM')
                    ->orWhere('name', 'BENDAHARA_BEM')
                    ->orWhere('name', 'PANITIA_BEM');
            })->orderBy('name', 'ASC')->paginate(10);
        }

        return view('student.member', compact('students'))->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }
}