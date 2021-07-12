<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductionEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property int $meal_id
 * @property int $product_id
 * @property int $product_amount
 * @property string $description
 * @property string $combined_code
 * @property int $creator_id
 * @property int $updater_id
 * @property string $created_at
 * @property string $updated_at
 *
 */

class ProductionEntity extends Model
{
    protected $table = 'production';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meal_id',
        'product_id',
        'product_amount',
        'combined_code',
        'description',
        'creator_id',
        'updater_id',
    ];

}
