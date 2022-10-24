<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RealizeParticipant
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $lpj_id
 * @property $participant_type_id
 * @property $participant_total
 * @property $notes
 *
 * @property Lpj $lpj
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RealizeParticipant extends Model
{

  static $rules = [
    'lpj_id' => 'required',
    'participant_type_id' => 'required',
    'participant_total' => 'required',
    'notes' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'realize_participants';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['lpj_id', 'participant_type_id', 'participant_total', 'notes'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function lpj()
  {
    return $this->hasOne('App\Models\Lpj', 'id', 'lpj_id');
  }

  public function participantType()
  {
    return $this->hasOne('App\Models\ParticipantType', 'id', 'participant_type_id');
  }
}
