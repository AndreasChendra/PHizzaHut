<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Transaction;
use App\DetailTransaction;

class TransactionController extends Controller
{
    /**
     * function index berfungsi untuk menampilkan transaksi dari 
     * masing-masing user, kemudian juga ada kondisi dimana kalau user nya adalah
     * admin maka akan tampilkan semua data transaksi, apabila user nya adalah 
     * member maka akan ditampilkan transaksi user tersebut saja.
     */
    public function index($user_id)
    {
        $user = User::find($user_id);
        if(\Auth::user() != null && \Auth::user()->role_id == 1){
            $transaction = Transaction::all();
        }else{
            $transaction = Transaction::where('user_id', $user_id)->get();
        }
        
        return view('transaction.transaction_history', ['transactions' => $transaction]);
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
     * function store berfungsi untuk menyimpan data transaksi dari user
     * apabila user sudah melakukan check out pada page cart,
     * kemudian semua detail dari transaksi tersebut akan dimasukkan ke database detail
     * transaksi nya juga. Setelah semua data sudah dimasukkan maka data yang berada pada cart
     * tersebut akan dihapus.
     */
    public function store($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->get();

        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->save();

        foreach ($cart as $ct) {
            $detail_transaction = new DetailTransaction();
            $detail_transaction->transaction_id = $transaction->id;
            $detail_transaction->pizza_id = $ct->pizza_id;
            $detail_transaction->quantity = $ct->quantity;
            $detail_transaction->save();
        }

        $cart = Cart::where('user_id', $user_id)->delete();

        return redirect()->back();
    }

    /**
     * function show berfungsi untuk menampilkan detail dari setiap transaksi
     * berdasarkan dari transaksi yang diklik oleh user di page.
     */
    public function show($id)
    {
        $detail_transaction = DetailTransaction::where('transaction_id', $id)->get();
        return view ('transaction.transaction_detail', ['transaction' => $detail_transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
