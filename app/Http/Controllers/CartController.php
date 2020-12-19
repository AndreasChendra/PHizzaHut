<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Pizza;

class CartController extends Controller
{
    /**
     * function index berfungsi untuk menampilkan
     * pizza yang telah dimasukkan kedalam cart 
     * berdasarkan user tersebut
     */
    public function index($user_id)
    {
        $user = User::find($user_id);
        if ($user->role_id == 2) {
            $cart = Cart::where('user_id', $user_id)->get();
            return view('user.cart', ['carts' => $cart]);
        } else {
            return redirect('home');
        }
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
     * function store berfungsi untuk memasukkan data
     * pizza ke cart berdasarkan pizza yang user add to cart.
     * kemudian apabila cart tersebut sudah ada pizza jenis yang sama
     * maka mencegah duplikat kami langsung menambahkan berdasarkan quantity
     * yang dimasukkan.
     */
    public function store(Request $request, $pizza_id, $user_id)
    {
        $pizza = Pizza::find($pizza_id);
        $user = User::find($user_id);
        $this->validate($request,[
            'quantity' => ['required', 'int', 'min:1'],
        ]);
        
        $cart = Cart::where([
            [
                'user_id', $user_id
            ],
            [
                'pizza_id', $pizza_id
            ],
        ])->first();

        if ($cart != null) {
            $cart->quantity += $request->input('quantity');
        } else {  
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->pizza_id = $pizza->id;
            $cart->quantity = $request->input('quantity');
        }
        $cart->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * function update berfungsi untuk melakukan update
     * quantity pada cart apabila user ingin menambah quantity
     * pembelian pizza
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'quantity' => ['required', 'int', 'min:1'],
        ]);

        $cart = Cart::find($id);
        $cart->quantity = $request->input('quantity');
        $cart->save();

        return redirect()->back();
    }

    /**
     * function destroy berfungsi untuk menghapus salah satu pizza
     * dalam cart user apabila user tidak jadi membeli pizza 
     * tersebut
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return back();
    }
}
