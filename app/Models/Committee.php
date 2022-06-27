<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Committee
 *
 * @property $id
 * @property $proposal_id
 * @property $user_id
 * @property $position
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Committee extends Model
{
    
    static $rules = [
		'proposal_id' => 'required',
		'user_id' => 'required',
		'position' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proposal_id','user_id','position'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal');
    }

}
