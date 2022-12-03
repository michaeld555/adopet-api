<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PetImage
 * 
 * @property int $id_pet_image
 * @property string|null $url_image
 * @property int|null $id_pet
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * 
 * @property Pet|null $pet
 *
 * @package App\Models
 */
class PetImage extends Model
{
	use SoftDeletes;

	protected $table = 'pet_images';

	protected $primaryKey = 'id_pet_image';
	
	public $timestamps = false;

	protected $casts = [
		'id_pet' => 'int'
	];

	protected $fillable = [
		'url_image',
		'id_pet'
	];

	public function pet()
	{
		return $this->belongsTo(Pet::class, 'id_pet');
	}
}
