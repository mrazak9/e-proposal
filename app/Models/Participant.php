<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Participant
 *
 * @property $id
 * @property $proposal_id
 * @property $participant_type_id
 * @property $participant_total
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Participant extends Model
{
    
    static $rules = [
		'proposal_id' => 'required',
		'participant_type_id' => 'required',
		'participant_total' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'participants';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proposal_id','participant_type_id','participant_total'];

    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal',);
    }

    public function participantType()
    {
        return $this->hasOne('App\Models\ParticipantType', 'id', 'participant_type_id');
    }

}
