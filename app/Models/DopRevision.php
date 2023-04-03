<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DopRevision
 *
 * @property $id
 * @property $dop_id
 * @property $user_id
 * @property $revision
 * @property $created_at
 * @property $updated_at
 *
 * @property Dop $dop
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DopRevision extends Model
{

  static $rules = [
    'dop_id' => 'required',
    'user_id' => 'required',
    'revision' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'dop_revisions';
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['dop_id', 'user_id', 'revision'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function dop()
  {
    return $this->belongsTo('App\Models\Dop');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
