<?php

namespace App\Http\Controllers;

use App\Models\ReceiptOfFundsDop;
use Illuminate\Http\Request;

/**
 * Class ReceiptOfFundsDopController
 * @package App\Http\Controllers
 */
class ReceiptOfFundsDopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receiptOfFundsDops = ReceiptOfFundsDop::paginate();

        return view('receipt-of-funds-dop.index', compact('receiptOfFundsDops'))
            ->with('i', (request()->input('page', 1) - 1) * $receiptOfFundsDops->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receiptOfFundsDop = new ReceiptOfFundsDop();
        return view('receipt-of-funds-dop.create', compact('receiptOfFundsDop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ReceiptOfFundsDop::$rules);

        $receiptOfFundsDop = ReceiptOfFundsDop::create($request->all());

        return redirect()->route('receipt-of-funds-dops.index')
            ->with('success', 'ReceiptOfFundsDop created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receiptOfFundsDop = ReceiptOfFundsDop::find($id);

        return view('receipt-of-funds-dop.show', compact('receiptOfFundsDop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receiptOfFundsDop = ReceiptOfFundsDop::find($id);

        return view('receipt-of-funds-dop.edit', compact('receiptOfFundsDop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ReceiptOfFundsDop $receiptOfFundsDop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiptOfFundsDop $receiptOfFundsDop)
    {
        request()->validate(ReceiptOfFundsDop::$rules);

        $receiptOfFundsDop->update($request->all());

        return redirect()->route('receipt-of-funds-dops.index')
            ->with('success', 'ReceiptOfFundsDop updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $receiptOfFundsDop = ReceiptOfFundsDop::find($id)->delete();

        return redirect()->route('receipt-of-funds-dops.index')
            ->with('success', 'ReceiptOfFundsDop deleted successfully');
    }
}
