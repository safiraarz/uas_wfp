<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function obat()
    {
        return $this->belongsToMany('App\Obat', 'transaksi_obat', 'transaksi_id', 'obat_id')->withPivot('kuantitas', 'harga');;
    }

    public function tambahObat($cart, $user)
    {
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['kuantitas'] * $details['harga'];
            $this->obat()->attach($id, ['kuantitas' => $details['kuantitas'], 'harga' => $details['harga'] * $details['kuantitas']]);
        }
        return $total;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
