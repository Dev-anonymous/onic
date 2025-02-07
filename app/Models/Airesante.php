<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Airesante
 * 
 * @property int $id
 * @property int $zonesante_id
 * @property string|null $airesante
 * 
 * @property Zonesante $zonesante
 * @property Collection|Structuresante[] $structuresantes
 *
 * @package App\Models
 */
class Airesante extends Model
{
	protected $table = 'airesante';
	public $timestamps = false;

	protected $casts = [
		'zonesante_id' => 'int'
	];

	protected $fillable = [
		'zonesante_id',
		'airesante'
	];

	public function zonesante()
	{
		return $this->belongsTo(Zonesante::class);
	}

	public function structuresantes()
	{
		return $this->hasMany(Structuresante::class);
	}
}
