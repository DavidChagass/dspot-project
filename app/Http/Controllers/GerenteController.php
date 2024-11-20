<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\estoque;
use App\Models\gerentes;
use Exception;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    //
    public function create()
    {
        return view('produtos.create');
    }



}
