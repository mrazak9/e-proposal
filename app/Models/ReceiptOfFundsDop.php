<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReceiptOfFundsDop
 *
 * @property $id
 * @property $dop_id
 * @property $user_id
 * @property $nominal
 * @property $tanggal
 * @property $created_at
 * @property $updated_at
 *
 * @property Dop $dop
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReceiptOfFundsDop extends Model
{

  static $rules = [
    'dop_id' => 'required',
    'user_id' => 'required',
    'nominal' => 'required',
    'tanggal' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'receipt_of_funds_dop';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['dop_id', 'user_id', 'nominal', 'tanggal'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function dop()
  {
    return $this->hasOne('App\Models\Dop', 'id', 'dop_id');
  }
}
