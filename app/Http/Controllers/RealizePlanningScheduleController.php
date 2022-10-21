<?php

namespace App\Http\Controllers;

use App\Models\RealizePlanningSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;

/**
 * Class RealizePlanningScheduleController
 * @package App\Http\Controllers
 */
class RealizePlanningScheduleController extends Controller
{

    public function store(Request $request)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $realizePlanningSchedule = RealizePlanningSchedule::create([
            'lpj_id'        => $lpj_id,
            'user_id'       => $request->user_id,
            'kegiatan'      => $request->kegiatan,
            'notes'         => $request->notes,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date
        ]);

        return back()->with('success', 'Realisasi Jadwal Perencanaan Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $user_id        = $request->user_id;
        $kegiatan       = $request->kegiatan;
        $notes          = $request->notes;
        $start_date     = $request->start_date;
        $end_date       = $request->end_date;

        $realizePlanningSchedule                = RealizePlanningSchedule::find($id);
        $realizePlanningSchedule->lpj_id        = $lpj_id;
        $realizePlanningSchedule->user_id       = $user_id;
        $realizePlanningSchedule->kegiatan      = $kegiatan;
        $realizePlanningSchedule->notes         = $notes;
        $realizePlanningSchedule->start_date    = $start_date;
        $realizePlanningSchedule->end_date      = $end_date;
        $realizePlanningSchedule->update();

        return redirect()->back()->with('success', 'Realisasi Jadwal Perencanaan updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizePlanningSchedule = RealizePlanningSchedule::find($id)->delete();

        return back()->with('success', 'RealizePlanningSchedule deleted successfully');
    }

    public function modal_store(Request $request)
    {
        $data           = $request->all();
        $lpj_id    = $request->lpj_id;

        //Tab Jadwal Perencanaan
        $jadwal_kegiatan        = $data["jadwal_kegiatan"];
        $jadwal_userID          = $data["jadwal_user_id"];
        $jadwal_start_date      = $data["jadwal_start_date"];
        $jadwal_end_date        = $data["jadwal_end_date"];
        $jadwal_notes           = $data["jadwal_notes"];
        $lpj_id            = Crypt::decrypt($lpj_id);

        if ($jadwal_userID) {
            foreach ($jadwal_userID  as $key => $value) {
                $jadwal                 = new RealizePlanningSchedule();
                $jadwal->lpj_id         = $lpj_id;
                $jadwal->user_id        = $jadwal_userID[$key];
                $jadwal->kegiatan       = $jadwal_kegiatan[$key];
                $jadwal->notes          = $jadwal_notes[$key];
                $jadwal->start_date     = $jadwal_start_date[$key];
                $jadwal->end_date       = $jadwal_end_date[$key];
                $jadwal->save();
            }
        }

        toastr()->success('Jadwal Perencanaan di Proposal berhasil ditambahkan.');
        return redirect()->back();
    }
}
