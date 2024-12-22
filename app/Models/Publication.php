<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publication
 * 
 * @property int $id
 * @property int $categoriepublication_id
 * @property int $users_id
 * @property string|null $titre
 * @property string|null $image
 * @property string|null $text
 * @property Carbon|null $date
 * @property Carbon|null $datemaj
 * @property string|null $editepar
 * 
 * @property Categoriepublication $categoriepublication
 * @property User $user
 *
 * @package App\Models
 */
class Publication extends Model
{
	protected $table = 'publication';
	public $timestamps = false;

	protected $casts = [
		'categoriepublication_id' => 'int',
		'users_id' => 'int',
		'date' => 'datetime',
		'datemaj' => 'datetime'
	];

	protected $fillable = [
		'categoriepublication_id',
		'users_id',
		'titre',
		'image',
		'text',
		'date',
		'datemaj',
		'editepar'
	];

	public function categoriepublication()
	{
		return $this->belongsTo(Categoriepublication::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
