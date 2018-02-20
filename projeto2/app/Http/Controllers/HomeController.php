<?php

namespace App\Http\Controllers;
use App\Http\Models\User;

class HomeController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('layout.inicio');
    }

}