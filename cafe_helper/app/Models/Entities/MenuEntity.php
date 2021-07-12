<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property int $menu_group
 * @property int $meal_id
 * @property float $price
 * @property string $description
 * @property string $creator_id
 * @property string $updater_id
 * @property string $created_at
 * @property string $updated_at
 *
 */

class MenuEntity extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_group',
        'meal_id',
        'price',
        'description',
        'creator_id',
        'updater_id',
    ];

}
