<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CommitteeRole
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CommitteeRole extends Model
{

  static $rules = [
    'name' => 'required',
  ];

  protected $perPage = 20;
  protected $table = 'committee_role';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];
}
