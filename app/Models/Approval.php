<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Approval
 *
 * @property $id
 * @property $proposal_id
 * @property $user_id
 * @property $name
 * @property $approved
 * @property $date
 * @property $created_at
 * @property $updated_at
 *
 * @property Proposal $proposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Approval extends Model
{

  static $rules = [
    'proposal_id' => 'required',
    'user_id' => 'required',
    'name' => 'required',
    'approved' => 'required',
    'date' => 'required',
    'level' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['proposal_id', 'user_id', 'name', 'approved', 'date', 'level'];


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
