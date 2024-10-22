<?php

namespace App\Livewire\Pages\Auth;

use App\Models\empresas;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $role, $dominio;

    public function login()
    {
        $user = User::where('email', $this->email)->first();

        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'dominio' => 'required|string|max:10',
        ]);

        $empresa = empresas::where('dominio', $this->dominio)->first();
        if (!$empresa) {
            session()->flash('error', 'erro dominio invalido');
            return;
        }
        if (
            /*   Auth::login('web')->attempt([
              'dominio' => $this->dominio,
              'email' => $this->email,
              'password' => $this->password,
              'role' => $this->role
          ]) */
            $user && Hash::check($this->password, $user->password)
        ) {
            Auth::login($user);
            //  dd($user);
            return redirect()->route('gerente-dashboard');

         //   return redirect()->route('gerente-dashboard');
        } else {
            dd($user);
            session()->flash('error', 'Credenciais inválidas');
        }


        /*
              if (Auth::attempt($credenciais)) {
                    $user = Auth::user();

                    switch ($user->role) {
                        case 'gerente':
                            return redirect()->route('gerente-dashboard');
                        case 'funcionario':
                            return redirect()->route('funcionario-dashboard');
                        case 'empresa':
                            return redirect()->route('empresa-dashboard');
                        default:
                            return redirect()->route('login')->withErrors(['email' => 'Credenciais inválidas']);
                    }
                } */
        //     $user = User::where('email', $this->email)->first();

        dd($user);

        //dd($this->dominio, $this->email, $this->password, $this->role);
        //    dd(Auth::attempt($this->email, $this->password));
        dd(User::where('email', $this->email)->first());
        session()->flash('error', 'Credenciais inválidas');
    }

    public function render()
    {
        return view('livewire.pages.auth.login')->layout('layouts.auth-layout');
    }
}
