<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id_state
 * @property string|null $state_name
 * @property string|null $initials
 * @property Carbon $created_at
 * 
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'state';

	protected $primaryKey = 'id_state';
	
	public $timestamps = false;

	protected $fillable = [
		'state_name',
		'initials'
	];

	public function cities()
	{
		return $this->hasMany(City::class, 'id_state');
	}
}
