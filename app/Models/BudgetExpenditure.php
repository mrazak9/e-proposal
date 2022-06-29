<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BudgetExpenditure
 *
 * @property $id
 * @property $proposal_id
 * @property $name
 * @property $qty
 * @property $price
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BudgetExpenditure extends Model
{
    
    static $rules = [
		'proposal_id' => 'required',
		'name' => 'required',
		'qty' => 'required',
		'price' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'budget_expenditure';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proposal_id','name','qty','price','total'];

    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal');
    }

}
