<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DopTransaction
 *
 * @property $id
 * @property $dop_id
 * @property $category
 * @property $amount
 * @property $note
 * @property $created_at
 * @property $updated_at
 *
 * @property Dop $dop
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DopTransaction extends Model
{

  static $rules = [
    'dop_id' => 'required',
    'category' => 'required',
    'amount' => 'required',
    'note' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'dop_transaction';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['dop_id', 'category', 'amount', 'note'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function dop()
  {
    return $this->belongsTo('App\Models\Dop');
  }
}
