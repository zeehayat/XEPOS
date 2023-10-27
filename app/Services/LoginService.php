<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
// User Validation..
    public static function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'error' => 'Invalid credentials',
            ], 401);
        }
        if ($user->is_admin) {

            // User is Admin then send a token with the ability.. We can then check this in the ability section of Sanctum
            $token = $user->createToken('role', ['admin']);
        }
        // Since we created only one user so this would not execute.... Just filling in the gap..
        else {
            $token = $user->createToken('role', ['simple']);
        } // Generate an access token for the user

        // Return the access token in the response

        return response()->json([
            'access_token' => $token->plainTextToken,
        ]);

    }
}
