<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientsEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $name
 * @property int $bonus_card
 * @property string $contacts
 * @property string $contact
 * @property string $description
 * @property int $creator_id
 * @property int $updater_id
 * @property string $created_at
 * @property string $updated_at
 *
 */

class ClientsEntity extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'bonus_card',
        'contacts',
        'contact',
        'description',
        'creator_id',
        'updater_id',
    ];
}
