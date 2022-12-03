<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id_city
 * @property string|null $city_name
 * @property int|null $id_state
 * @property Carbon $created_at
 * 
 * @property State|null $state
 * @property Collection|Pet[] $pets
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'city';
	protected $primaryKey = 'id_city';
	public $timestamps = false;

	protected $casts = [
		'id_state' => 'int'
	];

	protected $fillable = [
		'city_name',
		'id_state'
	];

	public function state()
	{
		return $this->belongsTo(State::class, 'id_state');
	}

	public function pets()
	{
		return $this->hasMany(Pet::class, 'id_pet_city');
	}
}
