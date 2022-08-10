<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Auth;
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
        $students = Student::paginate();
        $users = User::pluck('id', 'name');
        $organizations = Organization::pluck('id', 'name');
        return view('student.index', compact('students','users','organizations'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
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
        
        $student = Student::find($id); 
        $users = User::pluck('id', 'name');
        $organizations = Organization::pluck('id', 'name');
        return view('student.edit', compact('student','users','organizations'));
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

        switch($getOrganization){
            case('1'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMATIK');
                break;
            case('2'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMAKOMPAK');
                break;
            case('3'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_HIMAADBIS');
                break;
            case('4'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_BEM');
                break;
            case('5'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_BPM');
                break;
            case('6'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case('7'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_UKM');
                break;
            case('8'):
                $user->roles()->detach();
                $user->assignRole('ANGGOTA_KSM');
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
}
