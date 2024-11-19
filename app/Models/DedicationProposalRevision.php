<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DedicationProposalRevision
 *
 * @property $dedication_proposals_id
 * @property $user_id
 * @property $revision
 * @property $isDone
 * @property $created_at
 * @property $updated_at
 *
 * @property DedicationProposal $dedicationProposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DedicationProposalRevision extends Model
{
    
    static $rules = [
		'dedication_proposals_id' => 'required',
		'user_id' => 'required',
		'revision' => 'required',
		'isDone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dedication_proposals_id','user_id','revision','isDone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dedicationProposal()
    {
        return $this->hasOne('App\Models\DedicationProposal', 'id', 'dedication_proposals_id');
    }

    public function lppmUser()
    {
        return $this->belongsTo('App\Models\LppmUser','user_id','user_id');
    }
    

}
