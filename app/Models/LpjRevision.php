<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LpjRevision
 *
 * @property $id
 * @property $lpj_id
 * @property $user_id
 * @property $revision
 * @property $isDone
 * @property $created_at
 * @property $updated_at
 *
 * @property Lpj $lpj
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LpjRevision extends Model
{

  static $rules = [
    'lpj_id' => 'required',
    'user_id' => 'required',
    'revision' => 'required',
    'isDone' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'lpj_revisions';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['lpj_id', 'user_id', 'revision', 'isDone'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function lpj()
  {
    return $this->belongsTo('App\Models\Lpj');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
