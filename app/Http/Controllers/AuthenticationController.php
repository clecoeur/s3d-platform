<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    public function loginForm()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Récupérer l'utilisateur depuis Corcel
        $user = User::where('user_email', $request->input('email'))->first();

        // Vérifier le mot de passe
        if ($user && Hash::check($request->input('password'), $user->user_pass)) {
            // Authentification réussie
            Auth::login($user);

            return redirect('/'); // Rediriger vers la page souhaitée après la connexion
        } else {
            // Échec de l'authentification
            return redirect()->back()->withInput()->withErrors(['email' => 'Identifiants invalides']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Rediriger vers la page souhaitée après la déconnexion
        return redirect('/login')->with('status', 'Vous avez été déconnecté avec succès.');
    }

}
