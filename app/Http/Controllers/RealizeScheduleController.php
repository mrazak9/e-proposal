<?php

namespace App\Http\Controllers;

use App\Models\RealizeSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class RealizeScheduleController
 * @package App\Http\Controllers
 */
class RealizeScheduleController extends Controller
{

    public function store(Request $request)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $realizeSchedule = RealizeSchedule::create([
            'lpj_id'        => $lpj_id,
            'user_id'       => $request->user_id,
            'kegiatan'      => $request->kegiatan,
            'notes'         => $request->notes,
            'start_time'    => $request->start_time,
            'end_time'      => $request->end_time,
            'date'      => $request->date
        ]);

        return back()->with('success', 'Realisasi Susunan Acara Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $user_id        = $request->user_id;
        $kegiatan       = $request->kegiatan;
        $notes          = $request->notes;
        $start_time     = $request->start_time;
        $end_time       = $request->end_time;
        $date           = $request->date;

        $realizeSchedule                = RealizeSchedule::find($id);
        $realizeSchedule->lpj_id        = $lpj_id;
        $realizeSchedule->user_id       = $user_id;
        $realizeSchedule->kegiatan      = $kegiatan;
        $realizeSchedule->notes         = $notes;
        $realizeSchedule->start_time    = $start_time;
        $realizeSchedule->end_time      = $end_time;
        $realizeSchedule->date          = $date;
        $realizeSchedule->update();

        return redirect()->back()->with('success', 'Realisasi Susunan Acara updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizeSchedule = RealizeSchedule::find($id)->delete();

        return back()->with('success', 'Realisasi Susunan Acara deleted successfully');
    }

    public function modal_store(Request $request)
    {
        $data           = $request->all();
        $lpj_id         = $request->lpj_id;

        //Tab Susunan Acara
        $susunan_kegiatan = $data["susunan_kegiatan"];
        $susunan_userID = $data["susunan_user_id"];
        $susunan_date = $data["susunan_date"];
        $susunan_start_time = $data["susunan_start_time"];
        $susunan_end_time = $data["susunan_end_time"];
        $susunan_notes = $data["susunan_notes"];

        if ($susunan_userID) {
            foreach ($susunan_userID  as $key => $value) {
                $susunan = new RealizeSchedule();
                $susunan->lpj_id        = $lpj_id;
                $susunan->user_id       = $susunan_userID[$key];
                $susunan->kegiatan      = $susunan_kegiatan[$key];
                $susunan->notes         = $susunan_notes[$key];
                $susunan->date          = $susunan_date[$key];
                $susunan->start_time    = $susunan_start_time[$key];
                $susunan->end_time      = $susunan_end_time[$key];
                $susunan->save();
            }
        }

        toastr()->success('Realisasi Susunan Acara berhasil ditambahkan.');
        return redirect()->back();
    }
}
