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

    public function destroy($id)
    {
        $realizeBudgetReceipt = RealizeBudgetReceipt::find($id)->delete();

        return back()->with('success', 'Realisasi Penerimaan deleted successfully');
    }

    public function modal_store(Request $request)
    {
        $data           = $request->all();
        $lpj_id         = Crypt::decrypt($request->lpj_id);

        //Tab Penerimaan Anggaran
        $penerimaan_name = $data["penerimaan_name"];
        $penerimaan_type_anggaran = $data["penerimaan_type_anggaran_id"];
        $penerimaan_qty = $data["penerimaan_qty"];
        $penerimaan_price = $data["penerimaan_price"];

        if ($penerimaan_name) {
            foreach ($penerimaan_name  as $key => $value) {
                $penerimaan = new RealizeBudgetReceipt();
                $penerimaan->lpj_id = $lpj_id;
                $penerimaan->name = $penerimaan_name[$key];
                $penerimaan->type_anggaran_id = $penerimaan_type_anggaran[$key];
                $penerimaan->qty = $penerimaan_qty[$key];
                $penerimaan->price = $penerimaan_price[$key];
                $penerimaan->total = $penerimaan_price[$key] * $penerimaan_qty[$key];
                $penerimaan->save();
            }
        }
        toastr()->success('Penerimaan Anggaran di Proposal berhasil ditambahkan.');
        return redirect()->back();
    }
}
