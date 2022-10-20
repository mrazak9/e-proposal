<?php

namespace App\Http\Controllers;

use App\Models\RealizeBudgetReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class RealizeBudgetReceiptController
 * @package App\Http\Controllers
 */
class RealizeBudgetReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realizeBudgetReceipts = RealizeBudgetReceipt::paginate();

        return view('realize-budget-receipt.index', compact('realizeBudgetReceipts'))
            ->with('i', (request()->input('page', 1) - 1) * $realizeBudgetReceipts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realizeBudgetReceipt = new RealizeBudgetReceipt();
        return view('realize-budget-receipt.create', compact('realizeBudgetReceipt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $realizeBudgetReceipt = RealizeBudgetReceipt::create([
            'lpj_id' => $lpj_id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'total' => $request->qty * $request->price,
            'type_anggaran_id' => $request->type_anggaran_id
        ]);


        $url = Crypt::encrypt($lpj_id);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realizeBudgetReceipt = RealizeBudgetReceipt::find($id);

        return view('realize-budget-receipt.show', compact('realizeBudgetReceipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realizeBudgetReceipt = RealizeBudgetReceipt::find($id);

        return view('realize-budget-receipt.edit', compact('realizeBudgetReceipt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RealizeBudgetReceipt $realizeBudgetReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $name   = $request->name;
        $qty    = $request->qty;
        $price  = $request->price;
        $type_anggaran_id    = $request->type_anggaran_id;

        $realizeBudgetReceipt               = RealizeBudgetReceipt::find($id);
        $realizeBudgetReceipt->lpj_id       = $lpj_id;
        $realizeBudgetReceipt->name         = $name;
        $realizeBudgetReceipt->qty          = $qty;
        $realizeBudgetReceipt->price        = $price;
        $realizeBudgetReceipt->total        = $request->qty * $request->price;
        $realizeBudgetReceipt->type_anggaran_id        = $type_anggaran_id;
        $realizeBudgetReceipt->update();

        return back()->with('success', 'Realisasi Penerimaan deleted successfully')
            ->with('success', 'Realisasi Penerimaan updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizeBudgetReceipt = RealizeBudgetReceipt::find($id)->delete();

        return back()->with('success', 'Realisasi Penerimaan deleted successfully');
    }
}
