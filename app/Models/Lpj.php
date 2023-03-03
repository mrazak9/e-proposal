<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lpj
 *
 * @property $id
 * @property $proposal_id
 * @property $keberhasilan
 * @property $kendala
 * @property $notes
 * @property $link_lampiran
 * @property $link_dokumentasi_kegiatan
 * @property $created_at
 * @property $updated_at
 *
 * @property Proposal $proposal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lpj extends Model
{

  static $rules = [
    'proposal_id' => 'required',
    'keberhasilan' => 'required',
    'kendala' => 'required',
    'notes' => 'required',
    'link_lampiran' => 'required',
    'link_dokumentasi_kegiatan' => 'required',

  ];

  protected $perPage = 20;
  protected $table = 'lpj';

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['proposal_id', 'keberhasilan', 'kendala', 'notes', 'link_lampiran', 'link_dokumentasi_kegiatan', 'is_approved'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function proposal()
  {
    return $this->hasOne('App\Models\Proposal', 'id', 'proposal_id');
  }

  public function realisasi_pengeluaran()
  {
    return $this->hasMany('App\Models\RealizeBudgetExpenditure');
  }

  public function lpj_approval()
  {
    return $this->hasMany('App\Models\LpjApproval');
  }

  public function lpj_revision()
  {
    return $this->hasMany('App\Models\LpjRevision');
  }
}
