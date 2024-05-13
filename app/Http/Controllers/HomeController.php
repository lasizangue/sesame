<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Création ou ajout de log ou activité
        LogActivity::addToLog("Connexion à sesame");
        //
        return view('home');
    }
}
