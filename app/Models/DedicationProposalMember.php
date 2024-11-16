<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DedicationProposalMember
 *
 * @property $id
 * @property $dedication_proposals_id
 * @property $name
 * @property $identity_number
 * @property $affiliation
 * @property $created_at
 * @property $updated_at
 *
 * @property DedicationProposal $dedicationProposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DedicationProposalMember extends Model
{
    
    static $rules = [
		'dedication_proposals_id' => 'required',
		'name' => 'required',
		'identity_number' => 'required',
		'affiliation' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dedication_proposals_id','name','identity_number','affiliation'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dedicationProposal()
    {
        return $this->hasOne('App\Models\DedicationProposal', 'id', 'dedication_proposals_id');
    }
    

}
