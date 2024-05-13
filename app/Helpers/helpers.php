<?php

use App\Models\Detachement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;


define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("PAGEEDITCONT", "editcont");


//define("DEFAULTPASSOWRD", "password");

function evisible()
{
    if (auth()->user()->detachement->nomDetachement === "INFORMATIQUE") {
        return "visible";
    }
    return "disabled";
}

function userFullName()
{
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

function userEmail()
{
    return auth()->user()->email;
}

function userFonction()
{
    return auth()->user()->detachement->nomDetachement;
}

function setMenuClass($route, $classe)
{
    $routeActuel = request()->route()->getName();

    if (contains($routeActuel, $route)) {
        return $classe;
    }
    return "";
}

function setMenuActive($route)
{
    $routeActuel = request()->route()->getName();

    if ($routeActuel === $route) {
        return "active";
    }
    return "";
}

function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
    
}

function lastTime()
{
    Carbon::setLocale("fr");

    $notification=auth()->user()->unreadNotifications->first();
    if($notification!=null){
         $dernierTemps=$notification->created_at->diffForHumans();
    
    return $dernierTemps;
    }
   
}


