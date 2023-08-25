<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dop
 *
 * @property $id
 * @property $user_id
 * @property $organization_id
 * @property $amount
 * @property $note
 * @property $isApproved
 * @property $attachment
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dop extends Model
{

  static $rules = [
    'user_id' => 'required',
    'organization_id' => 'required',
    'amount' => 'required',
    'note' => 'required',

  ];

  protected $perPage = 20;
  protected $table = 'dops';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'organization_id', 'amount', 'note', 'isApproved', 'attachment'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function organization()
  {
    return $this->belongsTo('App\Models\Organization', 'organization_id');
  }
  public function dop_transaction()
  {
    return $this->hasMany('App\Models\DopTransaction');
  }
  public function receiptfundsdop()
  {
    return $this->hasOne('App\Models\ReceiptOfFundsDop');
  }
  public function dopRevision()
  {
    return $this->hasMany('App\Models\DopRevision');
  }
}