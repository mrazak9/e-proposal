<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RealizeBudgetReceipt
 *
 * @property $id
 * @property $lpj_id
 * @property $name
 * @property $qty
 * @property $price
 * @property $total
 * @property $type_anggaran_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Lpj $lpj
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RealizeBudgetReceipt extends Model
{

  static $rules = [
    'lpj_id' => 'required',
    'name' => 'required',
    'qty' => 'required',
    'price' => 'required',
    'total' => 'required',
    'type_anggaran_id' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'realize_budget_receipt';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['lpj_id', 'name', 'qty', 'price', 'total', 'type_anggaran_id', 'attachment'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function lpj()
  {
    return $this->hasOne('App\Models\Lpj', 'id', 'lpj_id');
  }
  public function type_anggaran()
  {
    return $this->belongsTo('App\Models\TypeAnggaran');
  }
}
