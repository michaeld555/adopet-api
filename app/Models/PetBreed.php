<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PetBreed
 * 
 * @property int $id_pet_breed
 * @property string|null $breed_name
 * @property int|null $id_type_pet
 * 
 * @property TypePet|null $type_pet
 * @property Collection|Pet[] $pets
 *
 * @package App\Models
 */
class PetBreed extends Model
{
	protected $table = 'pet_breed';

	protected $primaryKey = 'id_pet_breed';
	
	public $timestamps = false;

	protected $casts = [
		'id_type_pet' => 'int'
	];

	protected $fillable = [
		'breed_name',
		'id_type_pet'
	];

	public function type_pet()
	{
		return $this->belongsTo(TypePet::class, 'id_type_pet');
	}

	public function pets()
	{
		return $this->hasMany(Pet::class, 'id_pet_breed');
	}
}
