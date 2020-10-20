<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class InicioController extends Controller
{
    public function index()
    {
        return View('inicio.index');
    }
}
