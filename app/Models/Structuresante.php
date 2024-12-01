<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Structuresante
 * 
 * @property int $id
 * @property int $airesante_id
 * @property string|null $structure
 * @property string|null $adresse
 * @property string|null $contact
 * 
 * @property Airesante $airesante
 * @property Collection|Profil[] $profils
 *
 * @package App\Models
 */
class Structuresante extends Model
{
	protected $table = 'structuresante';
	public $timestamps = false;

	protected $casts = [
		'airesante_id' => 'int'
	];

	protected $fillable = [
		'airesante_id',
		'structure',
		'adresse',
		'contact'
	];

	public function airesante()
	{
		return $this->belongsTo(Airesante::class);
	}

	public function profils()
	{
		return $this->hasMany(Profil::class);
	}
}
