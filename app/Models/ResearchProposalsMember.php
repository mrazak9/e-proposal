<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ResearchProposalsMember
 *
 * @property $id
 * @property $research_proposals_id
 * @property $name
 * @property $identity_number
 * @property $affiliation
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ResearchProposalsMember extends Model
{
    
    static $rules = [
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
    protected $fillable = ['research_proposals_id','name','identity_number','affiliation'];



}
