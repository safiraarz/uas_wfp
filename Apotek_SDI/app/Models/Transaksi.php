<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaksi
 * 
 * @property int $id
 * @property Carbon $tanggal_transaksi
 * @property float $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $pembeli_id
 * 
 * @property Pembeli $pembeli
 * @property Collection|Obat[] $obats
 *
 * @package App\Models
 */
class Transaksi extends Model
{
	protected $table = 'transaksi';

	protected $casts = [
		'total' => 'float',
		'pembeli_id' => 'int'
	];

	protected $dates = [
		'tanggal_transaksi'
	];

	protected $fillable = [
		'tanggal_transaksi',
		'total',
		'pembeli_id'
	];

	public function pembeli()
	{
		return $this->belongsTo(Pembeli::class);
	}

	public function obats()
	{
		return $this->belongsToMany(Obat::class, 'transaksi_obat')
					->withPivot('kuantitas', 'harga')
					->withTimestamps();
	}
}
