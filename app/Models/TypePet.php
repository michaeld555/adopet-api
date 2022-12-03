<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypePet
 * 
 * @property int $id_type_pets
 * @property string|null $name_type_pet
 * 
 * @property Collection|PetBreed[] $pet_breeds
 * @property Collection|Pet[] $pets
 *
 * @package App\Models
 */
class TypePet extends Model
{
	protected $table = 'type_pets';

	protected $primaryKey = 'id_type_pets';
	
	public $timestamps = false;

	protected $fillable = [
		'name_type_pet'
	];

	public function pet_breeds()
	{
		return $this->hasMany(PetBreed::class, 'id_type_pet');
	}

	public function pets()
	{
		return $this->hasMany(Pet::class, 'id_pet_type');
	}
}
