<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pet
 * 
 * @property int $id_pet
 * @property string|null $pet_name
 * @property int|null $id_pet_type
 * @property int|null $id_pet_breed
 * @property int|null $id_pet_gender
 * @property int|null $pet_age
 * @property string|null $pet_description
 * @property int|null $id_user
 * @property int|null $id_pet_city
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property PetBreed|null $pet_breed
 * @property City|null $city
 * @property PetGender|null $pet_gender
 * @property TypePet|null $type_pet
 * @property Collection|PetImage[] $pet_images
 * @property Collection|SavedPet[] $saved_pets
 *
 * @package App\Models
 */
class Pet extends Model
{
	use SoftDeletes;
	protected $table = 'pets';
	protected $primaryKey = 'id_pet';

	protected $casts = [
		'id_pet_type' => 'int',
		'id_pet_breed' => 'int',
		'id_pet_gender' => 'int',
		'pet_age' => 'int',
		'id_user' => 'int',
		'id_pet_city' => 'int'
	];

	protected $fillable = [
		'pet_name',
		'id_pet_type',
		'id_pet_breed',
		'id_pet_gender',
		'pet_age',
		'pet_description',
		'id_user',
		'id_pet_city'
	];

	public function pet_breed()
	{
		return $this->belongsTo(PetBreed::class, 'id_pet_breed');
	}

	public function city()
	{
		return $this->belongsTo(City::class, 'id_pet_city');
	}

	public function pet_gender()
	{
		return $this->belongsTo(PetGender::class, 'id_pet_gender');
	}

	public function type_pet()
	{
		return $this->belongsTo(TypePet::class, 'id_pet_type');
	}

	public function pet_images()
	{
		return $this->hasMany(PetImage::class, 'id_pet');
	}

	public function saved_pets()
	{
		return $this->hasMany(SavedPet::class);
	}
}
