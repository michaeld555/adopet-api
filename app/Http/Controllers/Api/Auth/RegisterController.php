<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    /**
     * Create a new user and return him logged in
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ],[
            'email.unique' => 'Este email já está cadastrado, por favor, insira outro email.'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $user->save();

        $this->createRecentActivity("Efetuou seu cadastro", $user);

        $login = new LoginController;       
        return $login->login($request)->original;
        
    }
}
