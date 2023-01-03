<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Membership
 * 
 * @property int $id
 * @property string $jenis_membership
 * @property int $batas_poin
 * 
 * @property Collection|Pembeli[] $pembelis
 *
 * @package App\Models
 */
class Membership extends Model
{
	protected $table = 'membership';
	public $timestamps = false;

	protected $casts = [
		'batas_poin' => 'int'
	];

	protected $fillable = [
		'jenis_membership',
		'batas_poin'
	];

	public function pembelis()
	{
		return $this->hasMany(Pembeli::class);
	}
}
