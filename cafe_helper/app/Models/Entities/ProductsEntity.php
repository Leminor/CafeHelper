<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property int $unit_id
 * @property string $group
 * @property string $description
 * @property int $creator_id
 * @property int $updater_id
 * @property string $created_at
 * @property string $updated_at
 *
 */

class ProductsEntity extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'unit_id',
        'group',
        'description',
        'creator_id',
        'updater_id',
    ];

}
