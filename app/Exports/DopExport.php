<?php

namespace App\Exports;

use App\Models\Dop;
use App\Models\ReceiptOfFundsDop;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DopExport implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        
        return view('dop.report.print', [
            'dops' => ReceiptOfFundsDop::whereHas('dop', function ($query) {
                $query->where('isApproved', 1);
            })->whereBetween('created_at', 
            [$this->startDate, $this->endDate])
            ->orderBy('created_at', 'ASC')->get()
        ]);
    }
}