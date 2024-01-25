<?php
namespace App\Traits;

use Illuminate\Foundation\Auth\RegistersUsers as BaseRegistersUsers;
use Illuminate\Http\Request;

trait RegistersUsers
{
    use BaseRegistersUsers;

    /**
     * Manejar un intento de inicio de sesión para el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $data = $request->all();
        //dd($data);

        unset($data['_token']);
        if ($this->exist($data)) {
            return response()->json(['error' => 'El usuario ya existe']);
        }
        // Validación
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //dd($data);
        // Creación del usuario
        $user = $this->create($data);

        $this->guard()->login($user);


        return response()->json(['message' => 'Usuario registrado y autenticado exitosamente'], 200);
    }


}
