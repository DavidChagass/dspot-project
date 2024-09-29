<?php

namespace App\Livewire\Pages\Auth;
use App\Models\empresas;
use Exception;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Models\funcionarios;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Validator;

class FuncionarioRegister extends Component
{
    public $empresaid, $nome, $email, $telefone, $password, $passwordconfirm;

    protected $rules = [
        'empresaid' => 'required|integer|exists:empresas,id',
        'nome' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:funcionarios,email',
        'telefone' => 'required|string|max:250',
        'password' => 'required|string|min:8|confirmed',
        'passwordconfirm' => 'required|string|min:8|same:password'
    ];


    public function emit($event, $payload = [])
    {
        $this->dispatch($event, $payload);
    }

    public function register()
    {

        if (empty($this->telefone)) {
            session()->flash('error', 'O campo telefone é obrigatório');
            return;
        }

        //    dd($this);
        //  $dominio = DB::table('empresas')->where('id', 1 );
        /*
            $validator = Validator::make($this->attributes->toArray(), $this->rules);
            if ($validator->fails()) {
                 $this->emit('validationError', $validator->errors());
                 session()->flash('error', 'erro registrar funcionario: ' . $validator->errors()->first());
                 return;
            }*/

        //dd($this->nome, $this->email,  $this->password);
        $empresa = empresas::findOrFail($this->empresaid);
        $funcionario = funcionarios::create([
            'empresa_id' => $this->empresaid,
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' => Hash::make($this->password)
        ]);
        if (!$funcionario) {
            throw new Exception('Erro ao criar funcionário');
        }
        session()->flash('sucess', 'funcionario inserido');
        return redirect()->route('funcionario-dashboard');
    }

    public function render()
    {

        return view('livewire.pages.auth.funcionario-register')->layout('layouts.app');
    }
}

