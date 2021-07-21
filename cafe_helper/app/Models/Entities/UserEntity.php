<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StaffEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $contacts
 * @property string $contact
 * @property string $access
 * @property string $created_at
 * @property string $updated_at
 * @property string $login
 * @property string $password
 * @property string $remember_token
 * @property string $email
 * @property string $email_verified_at
 * @property string $api_token
 *
 */

class UserEntity extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'contact',
        'contacts',
        'password',
        'access',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
