<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLog
 *
 * @property $id
 * @property $user_id
 * @property $ip
 * @property $os
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserLog extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'ip' => 'required',
		'os' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'user_logs';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','ip','os'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
