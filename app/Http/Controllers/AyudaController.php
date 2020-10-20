<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AyudaController extends Controller
{
    public function index()
    {
        return View('ayuda.index');
    }
}
