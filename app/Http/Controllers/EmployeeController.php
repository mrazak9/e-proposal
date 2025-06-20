<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
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
        $employees = Employee::orderBy('department', 'ASC')->paginate(10);
        $users = User::doesntHave('student')->doesnthave('employee')->pluck('id', 'name');
        return view('employee.index', compact('employees', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
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
        $employee = new Employee();
        return view('employee.create', compact('employee'));
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
        request()->validate(Employee::$rules);

        $employee = Employee::create($request->all());

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully.');
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
        $employee = Employee::find($id);

        return view('employee.show', compact('employee'));
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
        $employee = Employee::find($id);
        $users = User::pluck('id', 'name');
        return view('employee.edit', compact('employee', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        request()->validate(Employee::$rules);

        $employee->update($request->all());

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee updated successfully');
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
        $employee = Employee::find($id)->delete();

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee deleted successfully');
    }

    public function search(Request $request)
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort('401');
        }
        $search = $request->search;
        $users = User::doesntHave('student')->doesnthave('employee')->pluck('id', 'name');
        $employees = Employee::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', "%" . $search . "%");
        })->paginate(10);


        return view('employee.index', compact('employees', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
    }
}
