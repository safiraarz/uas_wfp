<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembeli
 * 
 * @property int $id
 * @property string $nama
 * @property string|null $alamat
 * @property int $poin
 * @property int $membership_id
 * 
 * @property Membership $membership
 * @property Collection|Transaksi[] $transaksis
 *
 * @package App\Models
 */
class Pembeli extends Model
{
	protected $table = 'pembeli';
	public $timestamps = false;

	protected $casts = [
		'poin' => 'int',
		'membership_id' => 'int'
	];

	protected $fillable = [
		'nama',
		'alamat',
		'poin',
		'membership_id'
	];

	public function membership()
	{
		return $this->belongsTo(Membership::class);
	}

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class);
	}
}
