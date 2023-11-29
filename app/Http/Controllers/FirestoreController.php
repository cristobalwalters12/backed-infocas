<?php
namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Illuminate\Http\Request;

class FirestoreController extends Controller
{
    private $firebaseAuth;

    public function __construct()
    {
        // Asegúrate de que la ruta al archivo de credenciales de Firebase sea correcta
        $serviceAccountPath = base_path(env('FIREBASE_CREDENTIALS'));

        if (!file_exists($serviceAccountPath)) {
            throw new \Exception('Firebase service account credentials file does not exist at path: ' . $serviceAccountPath);
        }

        // Instancia el Factory y obtén el servicio de autenticación directamente
        $firebase = (new Factory)->withServiceAccount($serviceAccountPath);
        $this->firebaseAuth = $firebase->createAuth();
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        try {
            $user = $this->firebaseAuth->getUserByEmail($credentials['correo']);
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Intenta iniciar sesión con las credenciales proporcionadas
        try {
            $signInResult = $this->firebaseAuth->signInWithEmailAndPassword($credentials['correo'], $credentials['password']);
        } catch (\Kreait\Firebase\Exception\Auth\FailedToSignIn $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Firebase ya verificó la contraseña por ti.
        // Puedes crear un token personalizado o usar el token proporcionado por Firebase.
        $idTokenString = $signInResult->idToken(); // Este es el ID token que puedes usar en el cliente.

        // Aquí puedes devolver el token ID para usar en el cliente
        return response()->json(['token' => $idTokenString], 200);
    }
}
