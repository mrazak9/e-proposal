<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ResearchProposalRevision
 *
 * @property $id
 * @property $research_proposals_id
 * @property $user_id
 * @property $revision
 * @property $isDone
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ResearchProposalRevision extends Model
{
    
    static $rules = [
		'revision' => 'required',
    ];

    protected $perPage = 20;
    protected $table= 'research_proposal_revisions';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['research_proposals_id','user_id','revision','isDone'];


    public function lppmUser()
    {
        return $this->belongsTo('App\Models\LppmUser','user_id','user_id');
    }
}
