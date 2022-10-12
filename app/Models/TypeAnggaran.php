<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeAnggaran
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeAnggaran extends Model
{

  static $rules = [
    'name' => 'required',
  ];
  protected $table = 'type_anggaran';
  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name'];

  public function budget_receipt()
  {
    return $this->hasOne('App\Models\BudgetExpenditure', 'id', 'type_anggaran_id');
  }
  public function budget_expenditure()
  {
    return $this->hasOne('App\Models\BudgetExpenditure', 'id', 'type_anggaran_id');
  }
}
