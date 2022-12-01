<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReceiptOfFund
 *
 * @property $id
 * @property $proposal_id
 * @property $user_id
 * @property $tanggal
 * @property $created_at
 * @property $updated_at
 *
 * @property Proposal $proposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReceiptOfFund extends Model
{

  static $rules = [
    'proposal_id' => 'required',
    'user_id' => 'required',
    'tanggal' => 'required',
    'nominal' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'receipt_of_funds';
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['proposal_id', 'user_id', 'tanggal', 'nominal'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function proposal()
  {
    return $this->belongsTo('App\Models\Proposal');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
