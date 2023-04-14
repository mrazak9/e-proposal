<?php

namespace App\Mail;

use App\Models\Dop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DanaRutinApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dop;

    public function __construct(Dop $dop)
    {
        $this->dop = $dop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.emails.danarutinapproved')
            ->from('eproposal@lpkia.ac.id', 'E-Proposal IDE LPKIA')
            ->subject('Pengajuan Dana Rutin - Disetujui');
    }
}
