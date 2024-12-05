<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Baniere
 * 
 * @property int $id
 * @property string|null $titre
 * @property string|null $description
 * @property string|null $image
 *
 * @package App\Models
 */
class Baniere extends Model
{
	protected $table = 'baniere';
	public $timestamps = false;

	protected $fillable = [
		'titre',
		'description',
		'image'
	];
}
