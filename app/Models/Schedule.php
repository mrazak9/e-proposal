<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property $id
 * @property $proposal_id
 * @property $user_id
 * @property $kegiatan
 * @property $notes
 * @property $times
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schedule extends Model
{
    
    static $rules = [
		'proposal_id' => 'required',
		'user_id' => 'required',
		'kegiatan' => 'required',
		'notes' => 'required',
		'times' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'schedule';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proposal_id','user_id','kegiatan','notes','times'];

    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
