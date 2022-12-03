<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use stdClass;

class LoginController extends BaseController
{
    /**
     * login user and create token
     *
     */
    public function login(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ],[
            'email.email' => 'Insira um email correto!',
            'email.required' => 'É obrigatorio inserir um email!',
            'password.required' => 'É obrigatorio inserir a senha!',
            'password.min' => 'A senha deve ter no minimo 8 caracteres',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors(), 400);
        }
        
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return $this->sendError('Credenciais inválidas', 401);
        }

        $user = $request->user();
        $token = $user->createToken('Personal Access Token');

        $data = $this->formatData($user, $token);

        $this->createRecentActivity('Efetuou login', $user);
        return $this->sendResponse($data, 'Login efetuado com sucesso');
    }

    /**
     * login user and create token using google
     *
     */
    public function loginGoogle(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        // Check that the user does not exist
        if (is_null($user)) {

            $user = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'google_id' => $request->google_id,
            ]);

            $this->createRecentActivity("Efetuou o cadastro com google", $user);
        }

        $user->save();
        
        $token = $user->createToken('Personal Access Token');
        $data = $this->formatData($user, $token);

        $this->createRecentActivity("Realizou o login com google", $user);
        return $this->sendResponse($data, 'Login efetuado com sucesso');
    }


    // Prepare response data
    public function formatData($user, $token) {

        $data = new stdClass;
        $data->id_user = $user->id_user;
        $data->name = $user->name;
        $data->token = $token->plainTextToken;

        return $data;
    }
}
