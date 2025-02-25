<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DedicationProposalSchedule
 *
 * @property $id
 * @property $dedication_proposals_id
 * @property $year_at
 * @property $event_name
 * @property $1
 * @property $2
 * @property $3
 * @property $4
 * @property $5
 * @property $6
 * @property $7
 * @property $8
 * @property $9
 * @property $10
 * @property $11
 * @property $12
 * @property $created_at
 * @property $updated_at
 *
 * @property DedicationProposal $dedicationProposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DedicationProposalSchedule extends Model
{
    
    static $rules = [
		'year_at' => 'required',
		'event_name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dedication_proposals_id','year_at','event_name','1','2','3','4','5','6','7','8','9','10','11','12'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dedicationProposal()
    {
        return $this->hasOne('App\Models\DedicationProposal', 'id', 'dedication_proposals_id');
    }
    

}
