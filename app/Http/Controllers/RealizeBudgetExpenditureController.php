<?php

namespace App\Http\Controllers;

use App\Models\RealizeBudgetExpenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class RealizeBudgetExpenditureController
 * @package App\Http\Controllers
 */
class RealizeBudgetExpenditureController extends Controller
{

    public function store(Request $request)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $realizeBudgetExpenditure = RealizeBudgetExpenditure::create([
            'lpj_id'            => $lpj_id,
            'name'              => $request->name,
            'qty'               => $request->qty,
            'price'             => $request->price,
            'total'             => $request->qty * $request->price,
            'type_anggaran_id'  => $request->type_anggaran_id,
            'attachment'  => $request->attachment
        ]);

        return back()->with('success', 'Realisasi Pengeluaran Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $name   = $request->name;
        $qty    = $request->qty;
        $price  = $request->price;
        $type_anggaran_id    = $request->type_anggaran_id;
        $attachment = $request->attachment;

        $realizeBudgetExpenditure               = RealizeBudgetExpenditure::find($id);
        $realizeBudgetExpenditure->lpj_id       = $lpj_id;
        $realizeBudgetExpenditure->name         = $name;
        $realizeBudgetExpenditure->qty          = $qty;
        $realizeBudgetExpenditure->price        = $price;
        $realizeBudgetExpenditure->total        = $request->qty * $request->price;
        $realizeBudgetExpenditure->type_anggaran_id        = $type_anggaran_id;
        $realizeBudgetExpenditure->attachment        = $attachment;
        $realizeBudgetExpenditure->update();

        return back()->with('success', 'Realisasi Pengeluaran updated successfully');
    }

    public function destroy($id)
    {
        $realizeBudgetExpenditure = RealizeBudgetExpenditure::find($id)->delete();

        return back()->with('success', 'Realisasi Pengeluaran deleted successfully');
    }

    public function modal_store(Request $request)
    {
        $data           = $request->all();
        $lpj_id         = Crypt::decrypt($request->lpj_id);

        //Tab pengeluaran Anggaran
        $pengeluaran_name = $data["pengeluaran_name"];
        $pengeluaran_type_anggaran = $data["pengeluaran_type_anggaran_id"];
        $pengeluaran_qty = $data["pengeluaran_qty"];
        $pengeluaran_price = $data["pengeluaran_price"];
        $pengeluaran_attachment = $data["pengeluaran_attachment"];

        if ($pengeluaran_name) {
            foreach ($pengeluaran_name  as $key => $value) {
                $pengeluaran = new RealizeBudgetExpenditure();
                $pengeluaran->lpj_id = $lpj_id;
                $pengeluaran->name = $pengeluaran_name[$key];
                $pengeluaran->type_anggaran_id = $pengeluaran_type_anggaran[$key];
                $pengeluaran->qty = $pengeluaran_qty[$key];
                $pengeluaran->price = $pengeluaran_price[$key];
                $pengeluaran->total = $pengeluaran_price[$key] * $pengeluaran_qty[$key];
                $pengeluaran->attachment = $pengeluaran_attachment[$key];
                $pengeluaran->save();
            }
        }
        toastr()->success('pengeluaran Anggaran di Proposal berhasil ditambahkan.');
        return redirect()->back();
    }
}
