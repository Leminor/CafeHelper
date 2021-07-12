<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SuppliersEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $company_name
 * @property string $name
 * @property string contacts
 * @property string $contact
 * @property string $description
 * @property int $creator_id
 * @property int $updater_id
 * @property string $created_at
 * @property string $updated_at
 *
 */

class SuppliersEntity extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'manager_name',
        'contacts',
        'contact',
        'description',
        'creator_id',
        'updater_id',
    ];

}
