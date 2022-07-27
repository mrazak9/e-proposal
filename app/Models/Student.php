<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property $id
 * @property $user_id
 * @property $nim
 * @property $prodi
 * @property $kelas
 * @property $organization_id
 * @property $position
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Student extends Model
{
    
    static $rules = [
		'user_id' => 'required|unique:students',
		'nim' => 'required',
		'prodi' => 'required',
		'kelas' => 'required',
		'organization_id' => 'required',
		'position' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','nim','prodi','kelas','organization_id','position'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function organization()
    {
        return $this->hasOne('App\Models\Organization', 'id', 'organization_id');
    }
    

}
