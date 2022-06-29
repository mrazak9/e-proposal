<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proposal
 *
 * @property $id
 * @property $name
 * @property $latar_belakang
 * @property $tujuan_kegiatan
 * @property $id_tempat
 * @property $tanggal
 * @property $id_kegiatan
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proposal extends Model
{
    
    static $rules = [
		'name' => 'required',
		'latar_belakang' => 'required',
		'tujuan_kegiatan' => 'required',
		'id_tempat' => 'required',
		'tanggal' => 'required',
		'id_kegiatan' => 'required',
    ];

    protected $perPage = 20;

    protected $table = 'proposal';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','latar_belakang','tujuan_kegiatan','id_tempat','tanggal','id_kegiatan'];

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function committee()
    {
        return $this->hasMany('App\Models\Committe', 'id', 'proposal_id');
    }

    public function budget_receipt()
    {
        return $this->hasMany('App\Models\budget_receipt', 'id', 'proposal_id');
    }

    public function budget_expenditure()
    {
        return $this->hasMany('App\Models\budget_expenditure', 'id', 'proposal_id');
    }


}
