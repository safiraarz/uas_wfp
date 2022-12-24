<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();
        $transaksi = Transaksi::where('users_id',$users->id)->get();
        
        return view('frontend.riwayat', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function submit_front()
    {
        $cart = session()->get('cart');
        $user = Auth::user();

        $t = new Transaksi;
        $t->users_id = $user->id;
        $t->tanggal_transaksi = Carbon::now()->toDatetimeString();
        $t->save();
        $total_harga = $t->TambahObat($cart,$user);
        // dd($total_harga);
        $t->total = $total_harga;
        $t->save();
        session()->forget('cart');
        return redirect('/');        
    }

    public function form_submit_front()
    {
        return view("frontend.checkout");
    }

    public function baru()
    {   
        $transaksi = Transaksi::all();
        // dd($transaksi);
        return view('transaksi.index', compact('transaksi'));
    }

    public function showAjax(Request $request){
        $id = $request->get('id');
        $data = Transaksi::find($id);
        $dataUsers = User::find($data->users_id);
        $pembeli = $dataUsers->name;
        $totals = $data->total;
        // dd($data->obat);
        return response()->json(array(
            'msg'=> view('transaksi.showmodal',compact('data', 'pembeli','totals'))->render()
        ), 200);
    }
}
