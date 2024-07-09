<?php

namespace App\Http\Controllers;

use App\Models\LeaderSubmission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LeaderSubmissionController
 * @package App\Http\Controllers
 */
class LeaderSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaderSubmissions = LeaderSubmission::paginate();

        return view('leader-submission.index', compact('leaderSubmissions'))
            ->with('i', (request()->input('page', 1) - 1) * $leaderSubmissions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myOrg              = Auth::user()->student->organization_id;
        $myID               = Auth::user()->id;

        $checkSubmission    = LeaderSubmission::select('user_id')->where('user_id', $myID)->exists();
        if ($checkSubmission) {
            return view('errors.pengajuan-ketua');
        }
        $leaderSubmission   = new LeaderSubmission();
        $previousLeader     = User::whereHas('student', function ($query) use ($myOrg) {
            $query->where('organization_id', $myOrg)
                ->where('position', '=', 'Ketua');
        })->orderBy('name', 'ASC')->pluck('id', 'name');

        return view('leader-submission.create', compact('leaderSubmission', 'previousLeader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LeaderSubmission::$rules);

        $leaderSubmission = LeaderSubmission::create(
            [
                'user_id'               => $request->user_id,
                'previous_leader_id'    => $request->previous_leader_id,
                'is_Approved'           => 0
            ]
        );
        toastr()->success('success', 'Berhasil melakukan pengajuan ketua. Silahkan konfirmasi Pembina Kemahasiswaan!');
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leaderSubmission = LeaderSubmission::find($id);

        return view('leader-submission.show', compact('leaderSubmission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaderSubmission = LeaderSubmission::find($id);

        return view('leader-submission.edit', compact('leaderSubmission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LeaderSubmission $leaderSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaderSubmission $leaderSubmission)
    {
        request()->validate(LeaderSubmission::$rules);

        $leaderSubmission->update($request->all());

        return redirect()->route('admin.leader-submissions.index')
            ->with('success', 'LeaderSubmission updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $leaderSubmission = LeaderSubmission::find($id)->delete();

        return redirect()->route('admin.leader-submissions.index')
            ->with('success', 'LeaderSubmission deleted successfully');
    }

    public function showSubmission()
    {
        $leaderSubmissions = LeaderSubmission::where('is_Approved', 0)->get();
        $leaderSubmissionsApproved = LeaderSubmission::where('is_Approved', 1)->get();

        return view('leader-submission.show-submission', compact('leaderSubmissions', 'leaderSubmissionsApproved'))->with('i');
    }

    public function approveSubmission(Request $request)
    {
        $id = $request->id;

        $submission = LeaderSubmission::find($id);
        $position = $request->position;

        $previousLeader = $submission->previous_leader_id;
        $leaderNow      = $submission->user_id;

        $leaderRevoke = User::find($previousLeader);

        $leaderRevoke->roles()->detach();
        $leaderRevoke->assignRole('GUEST');

        $leaderSet = User::find($leaderNow);

        $myRoles = $leaderSet->getRoleNames();
        $leaderSet->roles()->detach();
        $leaderSet->assignRole($position);

        $submission->is_Approved   = 1;
        $submission->update();

        return redirect()->back()
            ->with('success', 'Berhasil penetapan Ketua');
    }

    public function revokeSubmission(Request $request)
    {
        $id         = $request->id;
        $position   = $request->position;

        $submission = LeaderSubmission::find($id);
        $leaderNow  = User::find($submission->user_id);

        $leaderNow->roles()->detach();
        $leaderNow->assignRole($position);

        $submission->delete();

        return redirect()->back()
            ->with('success', 'Berhasil batalkan penetapan Ketua');
    }

    public function cancelSubmission($id)
    {
        $submission = LeaderSubmission::find($id);
        $submission->delete();

        return redirect()->back()
            ->with('success', 'Berhasil Batalkan Pengajuan Ketua');
    }
}
