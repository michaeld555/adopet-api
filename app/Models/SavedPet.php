<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SavedPet
 * 
 * @property int $id_saved_pet
 * @property int|null $pet_id
 * @property int|null $id_user
 * @property Carbon $created_at
 * 
 * @property Pet|null $pet
 *
 * @package App\Models
 */
class SavedPet extends Model
{
	protected $table = 'saved_pets';

	protected $primaryKey = 'id_saved_pet';
	
	public $timestamps = false;

	protected $casts = [
		'pet_id' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'pet_id',
		'id_user'
	];

	public function pet()
	{
		return $this->belongsTo(Pet::class);
	}
}
