<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 */

class WarehousesEntity extends Model
{
    protected $table = 'warehouses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

}
