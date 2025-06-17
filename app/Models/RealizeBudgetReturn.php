<?php

namespace App\Models;

use App\Models\Lpj;
use App\Models\RealizeBudgetReceipt;
use Illuminate\Database\Eloquent\Model;

class RealizeBudgetReturn extends Model
{
    protected $table = 'realize_budget_return';

    protected $fillable = [
        'lpj_id',
        'realize_budget_receipt_id',
        'total',
        'return_date',
        'notes',
        'user_id',
    ];

    // Relasi ke LPJ
    public function lpj()
    {
        return $this->belongsTo(Lpj::class);
    }

    // Relasi ke data penerimaan dana (receipt)
    public function receipt()
    {
        return $this->belongsTo(RealizeBudgetReceipt::class, 'realize_budget_receipt_id');
    }

    // Helper: Format total ke rupiah
    public function getFormattedTotalAttribute()
    {
        return number_format($this->total, 0, ',', '.');
    }

    // Helper: Cek apakah pengembalian ini valid (tidak melebihi nilai asal)
    public function isValidReturn()
    {
        return $this->total <= $this->receipt->total;
    }
}
