<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RealizeSchedule
 *
 * @property $id
 * @property $lpj_id
 * @property $user_id
 * @property $kegiatan
 * @property $notes
 * @property $start_time
 * @property $end_time
 * @property $created_at
 * @property $updated_at
 *
 * @property Lpj $lpj
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RealizeSchedule extends Model
{

  static $rules = [
    'lpj_id' => 'required',
    'user_id' => 'required',
    'kegiatan' => 'required',
    'notes' => 'required',
    'start_time' => 'required',
    'end_time' => 'required',
    'date' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'realize_schedule';
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['lpj_id', 'user_id', 'kegiatan', 'notes', 'start_time', 'end_time', 'date'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function lpj()
  {
    return $this->hasOne('App\Models\Lpj', 'id', 'lpj_id');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
