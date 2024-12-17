<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        return response()->json(['oioio']);
    }

    public function post(Request $request)
    {
        // Validação básica
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            DB::beginTransaction();

            // Criação do usuário
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Usuário criado com sucesso!',
                'user' => $user,
            ], 201);

        } catch(Exception $e) {

            DB::rollBack();

            return response()->json([
                "message" => $e->getMessage()
            ], 500);

        }

    }
}
