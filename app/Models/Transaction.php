<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property int $paiement_id
 * @property int $users_id
 * @property float|null $montant
 * @property string|null $devise
 * @property Carbon|null $date
 * @property string|null $ref
 * @property string|null $paydata
 * 
 * @property Paiement $paiement
 * @property User $user
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transaction';
	public $timestamps = false;

	protected $casts = [
		'paiement_id' => 'int',
		'users_id' => 'int',
		'montant' => 'float',
		'date' => 'datetime'
	];

	protected $fillable = [
		'paiement_id',
		'users_id',
		'montant',
		'devise',
		'date',
		'ref',
		'paydata'
	];

	public function paiement()
	{
		return $this->belongsTo(Paiement::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
