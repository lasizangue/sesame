<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class NotificationComp extends Component
{
    public $routeActuel;
    public $ind=false;
    public $indouv=false;
    public $all=false;
    public $editNotification=[];

    use WithPagination;

   // public $search = "";
    protected $paginationTheme = "bootstrap";

    public function render()
    {

        $this->routeActuel = request()->route()->getName();

        $UnNotifications=auth()->user()->unreadNotifications;
        $notifications=auth()->user()->notifications;


        return view('livewire.notifications.index',[
           
            "unNotifications" => $UnNotifications->take(6),
            "notifications" => $notifications
            ])
        ->extends('layouts.master')
        ->section("contenu");
    
 }


    public function goToNotify($unNotification){
       
        $this->indouv=true;
        $this->ind=true;
        $this->all=false;
        $this->editNotification=$unNotification;
    }

    public function goToNotifyAll($notification){
       
        $this->indouv=true;
        $this->ind=true;
        $this->all=true;
        $this->editNotification=$notification;
    }

    public function goToNew(){
       
        redirect()->route('new');
        $this->all=false;
    
    }

     public function goToAll(){
       
        redirect()->route('all');
        $this->all=false;
    
    }
    public function marquer(){
        auth()->user()->unreadNotifications->markAsRead();
        redirect()->route('all');
    }
}
