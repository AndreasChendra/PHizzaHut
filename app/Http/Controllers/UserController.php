<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * function index berfungsi untuk menampilkan semua data
     * user yang sudah daftar/melakukan registrasi di website ini.
     * kemudian didalam function ini juga diberikan paginate 6
     * dimana apabila data user lebih dari 6 maka akan dipindahkan kepage 
     * baru (paginate function ini sama juga dengan paginate pizza pada bagian HomeController@index)
     */
    public function index()
    {
        if (\Auth::user() != null && \Auth::user()->role_id != 1){
            return redirect('home');
        }
        $users = User::paginate(6);
        return view('user.user', ['users'=>$users]);
    }

    /**
     * function checkEmail berfungsi untuk mengecek email yang dimasukkan oleh user
     * apakah sesuai dengan email yang sudah diregistrasi, apabila sama maka
     * akan di redirect ke halam change password.
     */
    public function checkEmail(Request $request)
    {
        $email = User::where('email', $request->email)->first();

        if ($email != null) {
            return view('auth.passwords.change_password', ['user_id'=>$email->id]);
        } else {
            return back();
        }
    }

    /**
     * function changePassword berfungsi untuk melakukan update password
     * user pada database, supaya user bisa melakukan login dan bisa melakukan
     * transaksi pizza kembali. 
     */
    public function changePassword(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('home');
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
