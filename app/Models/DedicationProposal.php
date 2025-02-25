<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DedicationProposal
 *
 * @property $id
 * @property $user_id
 * @property $title
 * @property $research_group
 * @property $cluster_of_knowledge
 * @property $type_of_skim
 * @property $location
 * @property $proposed_year
 * @property $length_of_activity
 * @property $source_of_funds
 * @property $application_status
 * @property $contract_status
 * @property $created_at
 * @property $updated_at
 *
 * @property DedicationProposalDetail[] $dedicationProposalDetails
 * @property DedicationProposalMember[] $dedicationProposalMembers
 * @property DedicationProposalRevision[] $dedicationProposalRevisions
 * @property DedicationProposalSchedule[] $dedicationProposalSchedules
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DedicationProposal extends Model
{

    static $rules = [
        'title' => 'required',
        'research_group' => 'required',
        'cluster_of_knowledge' => 'required',
        'type_of_skim' => 'required',
        'location' => 'required',
        'proposed_year' => 'required',
        'length_of_activity' => 'required',
        'source_of_funds' => 'required',
        'implementation_date' => 'required',        
        'implementation_year' => 'required',        
        'end_implementation_date' => 'required',  
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'research_group', 'cluster_of_knowledge', 'type_of_skim', 'location', 'proposed_year', 'length_of_activity', 'source_of_funds', 'application_status', 'contract_status', 'implementation_year', 'implementation_date','end_implementation_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lppmUser()
    {
        return $this->belongsTo('App\Models\LppmUser', 'user_id', 'user_id');
    }

    public function dedicationProposalDetail()
    {
        return $this->hasOne('App\Models\DedicationProposalDetail', 'dedication_proposals_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dedicationProposalMembers()
    {
        return $this->hasMany('App\Models\DedicationProposalMember', 'dedication_proposals_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dedicationProposalRevisions()
    {
        return $this->hasMany('App\Models\DedicationProposalRevision', 'dedication_proposals_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dedicationProposalsSchedule()
    {
        return $this->hasMany('App\Models\DedicationProposalSchedule', 'dedication_proposals_id', 'id');
    }
}
