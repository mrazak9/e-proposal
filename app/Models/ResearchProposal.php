<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ResearchProposal
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
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ResearchProposal extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'title' => 'required',
		'research_group' => 'required',
		'cluster_of_knowledge' => 'required',
		'type_of_skim' => 'required',
		'location' => 'required',
		'proposed_year' => 'required',
		'length_of_activity' => 'required',
		'source_of_funds' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','title','research_group','cluster_of_knowledge','type_of_skim','location','proposed_year','length_of_activity','source_of_funds'];



}
