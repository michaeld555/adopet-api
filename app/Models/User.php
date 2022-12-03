<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id_user
 * @property string|null $email
 * @property string|null $password
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $jwt_token
 * @property string|null $google_user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	
	protected $table = 'users';

	protected $primaryKey = 'id_user';

	protected $hidden = [
		'password',
		'jwt_token'
	];

	protected $fillable = [
		'email',
		'password',
		'name',
		'phone',
		'jwt_token',
		'google_user_id'
	];
}
