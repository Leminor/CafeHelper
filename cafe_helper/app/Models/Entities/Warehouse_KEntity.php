<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property int $product_id
 * @property float $amount
 * @property string $created_at
 * @property string $updated_at
 *
 */

class Warehouse_KEntity extends Model
{
    protected $table = 'warehouse-k';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'amount',
        'created_at',
        'updated_at',
    ];

}
