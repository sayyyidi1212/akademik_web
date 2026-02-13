<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB; //buat manggil database
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    //
    public function tokodashboard(Request $request)
    {
       

        return view('toko.dashboardToko');
    }
    // public function cart()
    // {
    //     return view('toko.cart'); // arahkan ke view cart yang kamu buat
    // }
    public function cart()
    {
        $produk = Produk::all(); // atau query yang sesuai kebutuhan
        return view('toko.cart', compact('produk'));
    }
    public function pesanan()
    {
        if (Auth::user()->user === 'Admin') {
            $transaksi = Transaksi::orderBy('tglTransaksi', 'desc')->get();
        } else {
            $username = Auth::user()->username;
            $transaksi = Transaksi::where('username', $username)
                            ->orderBy('tglTransaksi', 'desc')
                            ->get();
        }

        return view('toko.pesanan', compact('transaksi'));
    }



}
