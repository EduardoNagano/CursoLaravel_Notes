<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

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

        // check if user exists
        $user = User::where('username', $username)
            ->where('deleted_at', NULL)
            ->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorretos.');
        }

        // check if password is corret
        if (!password_verify($password, $user->password)) {
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorretos.');
        }

        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user (incluir o usuário na sessão)
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        echo date_default_timezone_get() . '<br>';
        echo 'Login com Sucesso!';
    }

    public function logout()
    {
        // logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
}
