<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ResearchProposalDetail
 *
 * @property $id
 * @property $research_proposals_id
 * @property $keyword
 * @property $background
 * @property $state_of_the_art
 * @property $road_map_research
 * @property $method_and_design
 * @property $references
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ResearchProposalDetail extends Model
{
    
    static $rules = [
		'research_proposals_id' => 'required',
		'keyword' => 'required',
		'background' => 'required',
		'state_of_the_art' => 'required',
		'road_map_research' => 'required',
		'method_and_design' => 'required',
		'references' => 'required',
		'summary' => 'required',
    'attachment' => 'mimes:pdf,jpg,jpeg|max:2048',
    
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['research_proposals_id','keyword','background','state_of_the_art','road_map_research','method_and_design','references','summary',
    'attachment'];

    public function researchProposals()
    {
        return $this->belongsTo('App\Models\ResearchProposal', 'research_proposals_id');
    }



}
