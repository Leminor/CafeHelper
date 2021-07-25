<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $menu_group
 * @property string $menu_subgroup
 * @property string $menu_branch
 * @property string $created_at
 * @property string $updated_at
 *
 */

class MenuGroupsEntity extends Model
{
    protected $table = 'menu_groups';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_group',
        'menu_subgroup',
        'menu_branch',
        'created_at',
        'updated_at',
    ];

}
