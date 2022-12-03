<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PetGender
 * 
 * @property int $id_pet_gender
 * @property string|null $gender_name
 * 
 * @property Collection|Pet[] $pets
 *
 * @package App\Models
 */
class PetGender extends Model
{
	protected $table = 'pet_gender';

	protected $primaryKey = 'id_pet_gender';
	
	public $timestamps = false;

	protected $fillable = [
		'gender_name'
	];

	public function pets()
	{
		return $this->hasMany(Pet::class, 'id_pet_gender');
	}
}
