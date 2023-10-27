<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService {

    public function login(array $data){
        $user = User::where('email', $data['email'])->first();

    if (!$user || !Hash::check($data['password'], $user->password)) {
        return response()->json([
            'error' => 'Invalid credentials',
        ], 401);
    }
    if($user->is_admin){

        $token = $user->createToken('role',['admin']);
    }
    else {
        $token = $user->createToken('role',['simple']);
    }// Generate an access token for the user

    // Return the access token in the response
    return response()->json([
        'access_token' => $token->plainTextToken,
    ]);

    }
}
