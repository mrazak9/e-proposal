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
        'tema_kegiatan' => 'required',
        'tujuan_kegiatan' => 'required',
        'id_tempat' => 'required',
        'tanggal' => 'required',
        'tanggal_selesai' => 'required',
        'id_kegiatan' => 'required',
    ];

    protected $perPage = 4;

    protected $table = 'proposal';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'latar_belakang', 'tema_kegiatan', 'tujuan_kegiatan', 'id_tempat', 'tanggal', 'tanggal_selesai', 'id_kegiatan', 'created_by', 'updated_by', 'owner', 'org_name', 'isFinished','attachment'];

    public function place()
    {
        return $this->hasOne('App\Models\Place', 'id', 'id_tempat');
    }

    public function event()
    {
        return $this->hasOne('App\Models\Event', 'id', 'id_kegiatan');
    }

    public function committee()
    {
        return $this->hasMany('App\Models\Committe', 'id', 'proposal_id');
    }

    public function participantType()
    {
        return $this->hasOne('App\Models\ParticipantType', 'id', 'proposal_id');
    }

    public function budget_receipt()
    {
        return $this->hasMany('App\Models\BudgetExpenditure', 'id', 'proposal_id');
    }

    public function budget_expenditure()
    {
        return $this->hasMany('App\Models\BudgetExpenditure', 'proposal_id');
    }

    public function revision()
    {
        return $this->hasMany('App\Models\Revision');
    }

    public function approval()
    {
        return $this->hasMany('App\Models\Approval');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function updated_user()
    {
        return $this->hasOne('App\User', 'id', 'updated_by');
    }

    public function lpj()
    {
        return $this->belongsTo('App\Models\Lpj');
    }

    public function receipt_of_fund()
    {
        return $this->hasMany('App\Models\ReceiptOfFund');
    }
}