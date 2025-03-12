<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DedicationProposalDetail
 *
 * @property $id
 * @property $dedication_proposals_id
 * @property $keyword
 * @property $background
 * @property $state_of_the_art
 * @property $road_map_research
 * @property $method_and_design
 * @property $references
 * @property $attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property DedicationProposal $dedicationProposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DedicationProposalDetail extends Model
{
    
    static $rules = [
		'keyword' => 'required',
		'background' => 'required',
		'state_of_the_art' => 'required',
		'road_map_research' => 'required',
		'method_and_design' => 'required',
		'references' => 'required',
		// 'attachment' => 'required',
		'summary' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dedication_proposals_id','keyword','background','state_of_the_art','road_map_research','method_and_design','references','attachment','summary'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dedicationProposal()
    {
        return $this->hasOne('App\Models\DedicationProposal', 'id', 'dedication_proposals_id');
    }
    

}
