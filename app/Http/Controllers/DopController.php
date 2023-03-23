<?php

namespace App\Http\Controllers;

use App\Models\Dop;
use App\Models\DopTransaction;
use App\Models\Organization;
use App\Models\ReceiptOfFundsDop;
use App\Models\Student;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

/**
 * Class DopController
 * @package App\Http\Controllers
 */
class DopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('VIEW_DOP')) {
            return abort(401);
        }
        $getOrgId   = Auth::User()->student->organization_id;
        $getOrgName = Organization::select('singkatan')->where('id', $getOrgId)->first();
        $orgName    = $getOrgName->singkatan;

        $isExist = Dop::select('attachment')->where('organization_id', $getOrgId)->where('attachment', NULL)->count();

        $dops      = Dop::where('organization_id', $getOrgId)->orderBy('created_at', 'DESC')->paginate(6);

        return view(
            'dop.index',
            compact(
                'dops',
                'orgName',
                'isExist'
            )
        )
            ->with('i', (request()->input('page', 1) - 1) * $dops->perPage());
    }
    public function process()
    {
        if (!Gate::allows('APPROVAL_DOP')) {
            return abort(401);
        }
        $dops      = Dop::orderBy('created_at', 'DESC')
            ->orderBy('isApproved', 'DESC')
            ->paginate(10);
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'like', "%" . 'BENDAHARA' . "%");
        })->orderBy('name', 'ASC')->pluck('id', 'name');

        return view(
            'dop.process',
            compact(
                'dops',
                'users'
            )
        )
            ->with('i', (request()->input('page', 1) - 1) * $dops->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dop = new Dop();
        return view('dop.create', compact('dop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id    = Auth::user()->id;
        $data = $request->all();
        $getOrgId   = Auth::User()->student->organization_id;
        $dop        = Dop::create([
            'user_id'           => $user_id,
            'organization_id'   => $getOrgId,
            'isApproved'        => 0,
            'attachment'        => null,
        ]);

        //Tab Kepanitiaan
        $category = $data["category"];
        $amount = $data["amount"];
        $note = $data["note"];

        if ($category) {
            foreach ($category  as $key => $value) {
                $dop_transaction            = new DopTransaction();
                $dop_transaction->dop_id    = $dop["id"];
                $dop_transaction->category  = $category[$key];
                $dop_transaction->amount    = $amount[$key];
                $dop_transaction->note      = $note[$key];
                $dop_transaction->save();
            }
        }

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dop = Dop::find($id);

        return view('dop.show', compact('dop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dop = Dop::find($id);

        return view('dop.edit', compact('dop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dop $dop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id                     = Crypt::decrypt($id);

        $dop                    = Dop::find($id);
        $dop->attachment        = $request->attachment;
        $dop->update();

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop updated successfully');
    }
    public function approve($id)
    {
        $id                     = Crypt::decrypt($id);

        $dop                    = Dop::find($id);
        $dop->isApproved        = 1;
        $dop->update();

        return redirect()->back()
            ->with('success', 'Pengajuan Dana berhasil disetujui');
    }
    public function revoke($id)
    {
        $id                     = Crypt::decrypt($id);

        $dop                    = Dop::find($id);
        $dop->isApproved        = 0;
        $dop->update();

        return redirect()->back()
            ->with('warning', 'Pengajuan Dana tidak disetujui');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $dop = Dop::find($id)->delete();

        return redirect()->route('admin.dops.index')
            ->with('success', 'Dop deleted successfully');
    }

    public function receiptFund(Request $request, $id)
    {
        $user_id        = $request->user_id;
        $nominal         = $request->nominal;
        $tanggal        = $request->tanggal;

        $receiptFundsDop        = ReceiptOfFundsDop::create([
            'dop_id'            => $id,
            'user_id'           => $user_id,
            'nominal'           => $nominal,
            'tanggal'           => $tanggal,
        ]);

        return redirect()->back()
            ->with('success', 'Pengambilan Dana berhasil dilakukan');
    }

    public function destroyReceiptFund($id)
    {
        $id     = Crypt::decrypt($id);
        $dops   = ReceiptOfFundsDop::where('dop_id', $id)
            ->first()
            ->delete();

        return redirect()->back()
            ->with('warning', 'Pengambilan Dana berhasil dibatalkan');
    }

    public function report(Request $request)
    {
        $startDate      = $request->startdate;
        $endDate        = $request->enddate;

        $dops           = Dop::where('isApproved', 1)->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'ASC')->get();
        return view(
            'dop.report.print',
            compact(
                'dops'
            )
        );
    }

    public function selectPeriod()
    {
        return view(
            'dop.selectperiod'
        );
    }
}
