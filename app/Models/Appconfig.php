<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appconfig
 * 
 * @property int $id
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $adresse
 * @property string|null $description
 * @property string|null $logo
 *
 * @package App\Models
 */
class Appconfig extends Model
{
	protected $table = 'appconfig';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'tel',
		'adresse',
		'description',
		'logo'
	];
}
