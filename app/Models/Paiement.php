<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paiement
 * 
 * @property int $id
 * @property int $users_id
 * @property string|null $description
 * @property float|null $montant
 * @property string|null $devise
 * @property Carbon|null $date
 * 
 * @property User $user
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class Paiement extends Model
{
	protected $table = 'paiement';
	public $timestamps = false;

	protected $casts = [
		'users_id' => 'int',
		'montant' => 'float',
		'date' => 'datetime'
	];

	protected $fillable = [
		'users_id',
		'description',
		'montant',
		'devise',
		'date'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
