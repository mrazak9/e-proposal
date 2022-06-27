<?php

namespace App\Http\Controllers;

use App\Models\BudgetExpenditure;
use Illuminate\Http\Request;

/**
 * Class BudgetExpenditureController
 * @package App\Http\Controllers
 */
class BudgetExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgetExpenditures = BudgetExpenditure::paginate();

        return view('budget-expenditure.index', compact('budgetExpenditures'))
            ->with('i', (request()->input('page', 1) - 1) * $budgetExpenditures->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $budgetExpenditure = new BudgetExpenditure();
        return view('budget-expenditure.create', compact('budgetExpenditure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BudgetExpenditure::$rules);

        $budgetExpenditure = BudgetExpenditure::create($request->all());

        return redirect()->route('budget-expenditures.index')
            ->with('success', 'BudgetExpenditure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budgetExpenditure = BudgetExpenditure::find($id);

        return view('budget-expenditure.show', compact('budgetExpenditure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budgetExpenditure = BudgetExpenditure::find($id);

        return view('budget-expenditure.edit', compact('budgetExpenditure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BudgetExpenditure $budgetExpenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetExpenditure $budgetExpenditure)
    {
        request()->validate(BudgetExpenditure::$rules);

        $budgetExpenditure->update($request->all());

        return redirect()->route('budget-expenditures.index')
            ->with('success', 'BudgetExpenditure updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $budgetExpenditure = BudgetExpenditure::find($id)->delete();

        return redirect()->route('budget-expenditures.index')
            ->with('success', 'BudgetExpenditure deleted successfully');
    }
}
