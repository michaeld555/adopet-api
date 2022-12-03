<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecentActivity
 * 
 * @property int $id_recent_activity
 * @property string $message
 * @property int $id_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class RecentActivity extends Model
{
	protected $table = 'recent_activity';
	
	protected $primaryKey = 'id_recent_activity';

	protected $casts = [
		'id_user' => 'int'
	];

	protected $fillable = [
		'message',
		'id_user'
	];
}
