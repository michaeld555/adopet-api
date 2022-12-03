<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PetStatus
 * 
 * @property int $id_pet_status
 * @property string|null $status_name
 *
 * @package App\Models
 */
class PetStatus extends Model
{
	protected $table = 'pet_status';

	protected $primaryKey = 'id_pet_status';
	
	public $timestamps = false;

	protected $fillable = [
		'status_name'
	];
}
