<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParticipantType
 *
 * @property $id
 * @property $name
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ParticipantType extends Model
{
    protected $table = 'participant_type';
    static $rules = [
		'name' => 'required',
		'notes' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','notes'];

    public function proposal()
    {
        return $this->hasOne('App\Models\proposal', 'id', 'proposal_id');
    }

}
