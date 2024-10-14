<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LppmUser
 *
 * @property $id
 * @property $user_id
 * @property $status
 * @property $nidn
 * @property $affiliation_id
 * @property $academic_grade_id
 * @property $group_of_work_id
 * @property $nik
 * @property $google_scholar_url
 * @property $scopus_id
 * @property $department_id
 * @property $handphone
 * @property $place_of_birth
 * @property $date_of_birth
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LppmUser extends Model
{
    
    static $rules = [
		'status' => 'required',
		'nidn' => 'required',
		'affiliation' => 'required',
		'academic_grade_id' => 'required',
		'group_of_work_id' => 'required',
		'nik' => 'required',
		'google_scholar_url' => 'required',
		'place_of_birth' => 'required',
		'date_of_birth' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','status','nidn','affiliation','academic_grade_id','group_of_work_id','nik','google_scholar_url','scopus_id','department_id','handphone','place_of_birth','date_of_birth'];



}
