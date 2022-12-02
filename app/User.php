<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'email', 'password', 'remember_token', 'google_id'];


    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'user_id');
    }

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'user_id');
    }

    public function planning_schedule()
    {
        return $this->hasOne('App\Models\PlanningSchedule', 'id', 'user_id');
    }

    public function committee()
    {
        return $this->hasMany('App\Models\Committee', 'id', 'user_id');
    }

    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule', 'id', 'user_id');
    }

    public function approval()
    {
        return $this->hasMany('App\Models\Approval', 'id', 'user_id');
    }

    public function revision()
    {
        return $this->hasMany('App\Models\Revision');
    }

    public function proposal()
    {
        return $this->hasOne('App\Models\Proposal', 'created_by');
    }

    public function receipt_of_fund()
    {
        return $this->hasOne('App\Models\ReceiptOfFund');
    }

    public function panitia()
    {
        return $this->hasMany('App\Models\Committee');
    }
}
