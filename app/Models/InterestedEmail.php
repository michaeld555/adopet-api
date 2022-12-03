<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InterestedEmail
 * 
 * @property int $id_interested_email
 * @property string|null $email_content
 * @property int|null $id_send_user
 * @property int|null $id_receiver_user
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class InterestedEmail extends Model
{
	protected $table = 'interested_emails';
	protected $primaryKey = 'id_interested_email';
	public $timestamps = false;

	protected $casts = [
		'id_send_user' => 'int',
		'id_receiver_user' => 'int'
	];

	protected $fillable = [
		'email_content',
		'id_send_user',
		'id_receiver_user'
	];
}
