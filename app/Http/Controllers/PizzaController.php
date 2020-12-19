<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use Storage;

class PizzaController extends Controller
{
    /**
     * function index berfungsi untuk menampilkan halaman add pizza
     * yang dimana page ini hanya bisa diakses oleh admin saja
     */
    public function index()
    {
        if(\Auth::user() != null && \Auth::user()->role_id != 1){
            return redirect('home');
        }
        return view('pizza.add_pizza');
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
     * function store berfungsi untuk menambahkan data pizza baru ke database.
     * sebelum data masuk ke database function ini melakukan validasi terhadap request dan apabila sesuai maka
     * data request ditambahkan ke database. function store juga membuat image yang diupload 
     * admin tersimpan di server storage
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:20'],
            'price' => ['required', 'numeric', 'min:10000'],
            'description' => ['required', 'string', 'min:20'],
            'image' => ['required', 'image'],
        ]);

        $pizza = new Pizza();
        $pizza->name = $request->input('name');
        $pizza->price = $request->input('price');
        $pizza->description = $request->input('description');
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = date('dmyHis').".".$ext;
        $pizza->image = str_replace('public', '/storage', Storage::putFileAs('/public/image', $request->image, $imageName));
        $pizza->save();
        return redirect('home');
    }

    /**
     * function show berfungsi untuk menampilkan detail suatu pizza.
     * detail pizza tersebut akan ditampilkan berdasarkan pizza yang diklik 
     * oleh user
     */
    public function show($id)
    {
        $pizzas = Pizza::find($id);
        return view('pizza.pizza_detail', ['pizza' => $pizzas]);
    }

    /**
     * function edit berfungsi untuk menampilkan data pizza yang ada di database
     * berdasarkan pizza id nya yang kemudian akan diupdate oleh admin,
     * kemudian page ini hanya bisa diakses oleh user yang rolenya adalah
     * admin
     */
    public function edit($id)
    {
        if(\Auth::user()->role_id != 1 && \Auth::user() != null){
            return redirect('home');
        }
        $pizza = Pizza::find($id);
        return view ('pizza.edit_pizza', compact($pizza))->with('pizzas', $pizza);
    }

    /**
     * function update fungsinya hampir sama dengan function store 
     * bedanya update berfungsi untuk mengubah data di database.
     * sebelum menyentuh database function update melakukan validasi 
     * terhadap request dan apabila sesuai maka data pizza dalam database 
     * di ubah dan image nya juga disimpan ke server storage
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:20'],
            'price' => ['required', 'int', 'min:10000'],
            'description' => ['required', 'string', 'min:20'],
            'image' => ['required', 'image'],
        ]);

        $pizza = Pizza::find($id);
        $pizza->name = $request->input('name');
        $pizza->price = $request->input('price');
        $pizza->description = $request->input('description');
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = date('dmyHis').".".$ext;
        $pizza->image = str_replace('public', '/storage', Storage::putFileAs('/public/image', $request->image, $imageName));
        $pizza->save();

        return back();
    }


    /**
     * function search berfungsi untuk menampilkan pizza 
     * yang akan didelete oleh admin berdasarkan pizza id
     */
    public function search($id)
    {
        if(\Auth::user() != null && \Auth::user()->role_id != 1){
            return redirect('home');
        }
        $pizzas = Pizza::find($id);
        return view ('pizza.delete_pizza', compact($pizzas))->with('pizza', $pizzas);
    }

    /**
     * function destroy berfungsi untuk menghapus data pizza di database
     * dan page ini hanya bisa diakses oleh admin saja.
     */
    public function destroy($id)
    {
        if(\Auth::user() != null && \Auth::user()->role_id != 1){
            return redirect('home');
        }
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return redirect('home');
    }
}
