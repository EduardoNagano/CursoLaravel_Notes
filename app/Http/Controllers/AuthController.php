<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        //dd($request); //dump&die

        // form validation
        $request->validate(
            // rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            // error messages
            [
                'text_username.required' => 'O Username é obrigatório',
                'text_username.email' => 'Username deve ser um e-mail válido',
                'text_password.required' => 'A Password é obrigatória',
                'text_password.min' => 'A Password deve ter no mínimo :min caracteres',
                'text_password.max' => 'A Password deve ter no máximo :max caracteres'
            ]
        );
        // Obs.: o Laravel cria automaticamente um objeto $errors e volta para a página anterior com esse objeto

        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // echo 'OK!';

        // get all the user from the database
        // $users = User::all()->toArray();

        // Outra forma: as an object instance of the model's class
        $userModel = new User();
        $users = $userModel->all()->toArray();

        echo '<pre>';
        print_r($users);
    }

    public function logout()
    {
        echo "logout";
    }
}
