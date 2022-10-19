<?php

namespace App\Http\Controllers;

use App\Models\RealizeBudgetReceipt;
use Illuminate\Http\Request;

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
        request()->validate(RealizeBudgetReceipt::$rules);

        $realizeBudgetReceipt = RealizeBudgetReceipt::create($request->all());

        return redirect()->route('realize-budget-receipts.index')
            ->with('success', 'RealizeBudgetReceipt created successfully.');
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
    public function update(Request $request, RealizeBudgetReceipt $realizeBudgetReceipt)
    {
        request()->validate(RealizeBudgetReceipt::$rules);

        $realizeBudgetReceipt->update($request->all());

        return redirect()->route('realize-budget-receipts.index')
            ->with('success', 'RealizeBudgetReceipt updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizeBudgetReceipt = RealizeBudgetReceipt::find($id)->delete();

        return redirect()->route('realize-budget-receipts.index')
            ->with('success', 'RealizeBudgetReceipt deleted successfully');
    }
}
