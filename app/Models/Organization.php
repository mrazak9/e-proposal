<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Organization
 *
 * @property $id
 * @property $name
 * @property $singkatan
 * @property $type
 * @property $head_organization
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Organization extends Model
{
    
    static $rules = [
		'name' => 'required',
		'singkatan' => 'required',
		'type' => 'required',
		'head_organization' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','singkatan','type','head_organization'];



}
