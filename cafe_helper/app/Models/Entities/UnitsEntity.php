<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $creator_id
 * @property int $updater_id
 * @property string $created_at
 * @property string $updated_at
 *
 */

class UnitsEntity extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'short_name',
        'creator_id',
        'updater_id',
        'created_at',
        'updated_at',
    ];

}
