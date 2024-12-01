<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profil
 * 
 * @property int $id
 * @property int|null $structuresante_id
 * @property int $users_id
 * @property Carbon|null $datenaissance
 * @property string|null $niveauetude
 * @property string|null $genre
 * @property string|null $numeroordre
 * @property string|null $adresse
 * @property string|null $fichier
 * 
 * @property Structuresante|null $structuresante
 * @property User $user
 *
 * @package App\Models
 */
class Profil extends Model
{
	protected $table = 'profil';
	public $timestamps = false;

	protected $casts = [
		'structuresante_id' => 'int',
		'users_id' => 'int',
		'datenaissance' => 'datetime'
	];

	protected $fillable = [
		'structuresante_id',
		'users_id',
		'datenaissance',
		'niveauetude',
		'genre',
		'numeroordre',
		'adresse',
		'fichier'
	];

	public function structuresante()
	{
		return $this->belongsTo(Structuresante::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
