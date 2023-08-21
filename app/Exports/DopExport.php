<?php

namespace App\Exports;

use App\Models\Dop;
use Maatwebsite\Excel\Concerns\FromCollection;

class DopExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dop::all();
    }
}
