<?php

namespace App\Exports;

use App\Models\Proposal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProposalExporter implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view() :View
    {        

        return view('dop.report.printnonrutin', [
            'proposals' => Proposal::whereHas('approval', function ($query) {
                $query->where('approved', 1)
                    ->where('name', "BAS");
            })->whereBetween('created_at', 
            [$this->startDate, $this->endDate])
            ->orderBy('created_at', 'ASC')->get()
        ]);
    }
}