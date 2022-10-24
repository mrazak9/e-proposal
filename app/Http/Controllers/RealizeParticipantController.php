<?php

namespace App\Http\Controllers;

use App\Models\RealizeParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class RealizeParticipantController
 * @package App\Http\Controllers
 */
class RealizeParticipantController extends Controller
{

    public function store(Request $request)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $realizeParticipant = RealizeParticipant::create([
            'lpj_id'                => $lpj_id,
            'participant_type_id'   => $request->participant_type_id,
            'participant_total'     => $request->participant_total,
            'notes'                 => $request->participant_notes,
        ]);

        return back()->with('success', 'Realisasi Peserta Berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $lpj_id = Crypt::decrypt($request->lpj_id);

        $participant_type_id    = $request->participant_type_id;
        $participant_total      = $request->participant_total;
        $notes                  = $request->notes;

        $realizeParticipant                         = RealizeParticipant::find($id);
        $realizeParticipant->lpj_id                 = $lpj_id;
        $realizeParticipant->participant_type_id    = $participant_type_id;
        $realizeParticipant->participant_total      = $participant_total;
        $realizeParticipant->notes                  = $notes;
        $realizeParticipant->update();

        return redirect()->back()->with('success', 'Realisasi Peserta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $realizeParticipant = RealizeParticipant::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Realisasi Peserta deleted successfully');
    }

    public function modal_store(Request $request)
    {
        $data           = $request->all();
        $lpj_id         = $request->lpj_id;

        //Tab Peserta
        $peserta_participant_type_id    = $data["peserta_participant_type_id"];
        $peserta_participant_total      = $data["peserta_participant_total"];
        $peserta_notes = $data["peserta_notes"];

        $lpj_id            = Crypt::decrypt($lpj_id);

        if ($peserta_participant_type_id) {
            foreach ($peserta_participant_type_id  as $key => $value) {
                $peserta                        = new RealizeParticipant();
                $peserta->lpj_id                = $lpj_id;
                $peserta->participant_type_id   = $peserta_participant_type_id[$key];
                $peserta->participant_total     = $peserta_participant_total[$key];
                $peserta->notes                 = $peserta_notes[$key];
                $peserta->save();
            }
        }

        toastr()->success('Realisasi  Peserta berhasil ditambahkan.');
        return redirect()->back();
    }
}
