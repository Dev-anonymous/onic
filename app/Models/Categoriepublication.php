<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoriepublication
 * 
 * @property int $id
 * @property string|null $categorie
 * 
 * @property Collection|Publication[] $publications
 *
 * @package App\Models
 */
class Categoriepublication extends Model
{
	protected $table = 'categoriepublication';
	public $timestamps = false;

	protected $fillable = [
		'categorie'
	];

	public function publications()
	{
		return $this->hasMany(Publication::class);
	}
}
