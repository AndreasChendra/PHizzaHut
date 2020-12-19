<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Cart;
use Auth;

class HomeController extends Controller
{
    /**
     * function index berfungsi untuk menampilkan data pizza yang ada didalam database
     * pada halaman home, kemudian diberikan paginate 6 dimana pizza akan ditampilkan perpage cuman
     * 6 data saja apabila lebih maka akan dilanjutkan ke page baru. Serta ada search untuk mencari pizza
     * yang diinginkan berdasarkan input data dari user
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pizza = Pizza::where('name', 'like', "%$search%")->paginate(6);
        return view('home', ['pizzas' => $pizza]);
    }
}
