<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LeaderSubmission
 *
 * @property $id
 * @property $previous_leader_id
 * @property $user_id
 * @property $is_Approved
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LeaderSubmission extends Model
{

    static $rules = [
        'previous_leader_id' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'leader_submissions';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['previous_leader_id', 'user_id', 'is_Approved'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userLeader()
    {
        return $this->hasOne('App\User', 'id', 'previous_leader_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
