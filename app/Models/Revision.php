<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Revision
 *
 * @property $id
 * @property $proposal_id
 * @property $user_id
 * @property $revision
 * @property $date
 * @property $created_at
 * @property $updated_at
 *
 * @property Proposal $proposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Revision extends Model
{
    
    static $rules = [
		'proposal_id' => 'required',
		'user_id' => 'required',
		'revision' => 'required',
		'date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proposal_id','user_id','revision','date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal');
    }
    

}
