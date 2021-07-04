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
 *
 */

class StaffEntity extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
