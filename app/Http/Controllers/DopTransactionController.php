<?php

namespace App\Http\Controllers;

use App\Models\DopTransaction;
use Illuminate\Http\Request;

/**
 * Class DopTransactionController
 * @package App\Http\Controllers
 */
class DopTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dopTransactions = DopTransaction::paginate();

        return view('dop-transaction.index', compact('dopTransactions'))
            ->with('i', (request()->input('page', 1) - 1) * $dopTransactions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dopTransaction = new DopTransaction();
        return view('dop-transaction.create', compact('dopTransaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DopTransaction::$rules);

        $dopTransaction = DopTransaction::create($request->all());

        return redirect()->route('dop-transactions.index')
            ->with('success', 'DopTransaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dopTransaction = DopTransaction::find($id);

        return view('dop-transaction.show', compact('dopTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dopTransaction = DopTransaction::find($id);

        return view('dop-transaction.edit', compact('dopTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DopTransaction $dopTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DopTransaction $dopTransaction)
    {
        request()->validate(DopTransaction::$rules);

        $dopTransaction->update($request->all());

        return redirect()->route('dop-transactions.index')
            ->with('success', 'DopTransaction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dopTransaction = DopTransaction::find($id)->delete();

        return redirect()->route('dop-transactions.index')
            ->with('success', 'DopTransaction deleted successfully');
    }
}
