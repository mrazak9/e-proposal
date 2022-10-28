<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LpjApproval
 *
 * @property $id
 * @property $lpj_id
 * @property $user_id
 * @property $name
 * @property $approved
 * @property $level
 * @property $date
 * @property $created_at
 * @property $updated_at
 *
 * @property Lpj $lpj
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LpjApproval extends Model
{

  static $rules = [
    'lpj_id' => 'required',
    'user_id' => 'required',
    'name' => 'required',
    'approved' => 'required',
    'level' => 'required',
    'date' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'lpj_approvals';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['lpj_id', 'user_id', 'name', 'approved', 'level', 'date'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function lpj()
  {
    return $this->hasOne('App\Models\Lpj', 'id', 'lpj_id');
  }
}
