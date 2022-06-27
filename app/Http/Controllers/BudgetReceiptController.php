<?php

namespace App\Http\Controllers;

use App\Models\BudgetReceipt;
use Illuminate\Http\Request;

/**
 * Class BudgetReceiptController
 * @package App\Http\Controllers
 */
class BudgetReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgetReceipts = BudgetReceipt::paginate();

        return view('budget-receipt.index', compact('budgetReceipts'))
            ->with('i', (request()->input('page', 1) - 1) * $budgetReceipts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $budgetReceipt = new BudgetReceipt();
        return view('budget-receipt.create', compact('budgetReceipt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BudgetReceipt::$rules);

        $budgetReceipt = BudgetReceipt::create($request->all());

        return redirect()->route('budget-receipts.index')
            ->with('success', 'BudgetReceipt created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budgetReceipt = BudgetReceipt::find($id);

        return view('budget-receipt.show', compact('budgetReceipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budgetReceipt = BudgetReceipt::find($id);

        return view('budget-receipt.edit', compact('budgetReceipt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BudgetReceipt $budgetReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetReceipt $budgetReceipt)
    {
        request()->validate(BudgetReceipt::$rules);

        $budgetReceipt->update($request->all());

        return redirect()->route('budget-receipts.index')
            ->with('success', 'BudgetReceipt updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $budgetReceipt = BudgetReceipt::find($id)->delete();

        return redirect()->route('budget-receipts.index')
            ->with('success', 'BudgetReceipt deleted successfully');
    }
}
