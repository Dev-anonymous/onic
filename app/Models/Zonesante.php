<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Zonesante
 * 
 * @property int $id
 * @property string|null $zonesante
 * 
 * @property Collection|Airesante[] $airesantes
 *
 * @package App\Models
 */
class Zonesante extends Model
{
	protected $table = 'zonesante';
	public $timestamps = false;

	protected $fillable = [
		'zonesante'
	];

	public function airesantes()
	{
		return $this->hasMany(Airesante::class);
	}
}
