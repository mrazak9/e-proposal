<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 * Class UserLogController
 * @package App\Http\Controllers
 */
class UserLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('MANAGE_MASTER_DATA')) {
            return abort(401);
        }
        $userLogs = UserLog::orderBy('created_at','DESC')->paginate(20);

        return view('user-log.index', compact('userLogs'))
            ->with('i', (request()->input('page', 1) - 1) * $userLogs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userLog = new UserLog();
        return view('user-log.create', compact('userLog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ip = request()->ip();
        $userAgent = request()->header('User-Agent');
        $userAgent = substr($userAgent, strpos($userAgent, '(') + 1, strpos($userAgent, ')') - strpos($userAgent, '(') - 1);

        $userLog = UserLog::create([
            'user_id'   =>  Auth::User()->id,
            'ip'        =>  $ip,
            'os'        =>  $userAgent
        ]);

        return redirect()->route('admin.user-logs.index')
            ->with('success', 'UserLog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userLog = UserLog::find($id);

        return view('user-log.show', compact('userLog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userLog = UserLog::find($id);

        return view('user-log.edit', compact('userLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserLog $userLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLog $userLog)
    {
        request()->validate(UserLog::$rules);

        $userLog->update($request->all());

        return redirect()->route('admin.user-logs.index')
            ->with('success', 'UserLog updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userLog = UserLog::find($id)->delete();

        return redirect()->route('admin.user-logs.index')
            ->with('success', 'UserLog deleted successfully');
    }
    public function destroyAll()
    {
        $userLog = UserLog::truncate();

        return redirect()->back()
            ->with('success', 'UserLog deleted successfully');
    }
}
