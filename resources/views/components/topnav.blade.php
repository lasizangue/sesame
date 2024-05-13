<div wire:poll.7s>
<nav class="main-header navbar navbar-expand navbar-white navbar-left">
   <ul class="navbar-nav">
      <li class="nav-item ">
          <a class="nav-link"  data-widget="pushmenu" role="button"><i class="fas fa-bars fa-2x"></i></a>
      </li>
    </ul>       
                              <!-- Right navbar links -->
    <ul class="navbar-nav mb-3">
      <li class="nav-item ">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{--<i class="fas fa-user"></i>--}}
    
              <img src="{{ Vite::asset('resources/images/LOGO.jpg') }} " style="width:100px; height:50px;" alt="Logo picture">
        </a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto mb-0 text-info">
      <li class="nav-item ">
        <h1>Transit général rapide</h1>
      </li>
    </ul>

    {{--NOTIFICATION--}}

    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        @if ( auth()->user()->notifications->take(99)->count()<=99 )
          <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ auth()->user()->notifications->take(99)->count() }}</span>
        </a>
        @else
          <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{ Vite::asset('resources/images/cloche.png') }}" width="23px" class="img-fluid">
          <span class="badge badge-danger navbar-badge">
          {{ auth()->user()->notifications->take(99)->count() }}</span>
        @endif
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">{{ auth()->user()->notifications->count() }} Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('new')}}"  class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>{{ auth()->user()->unreadNotifications->take(6)->count() }} new messages
            <span class="float-right text-muted text-sm">{{ lastTime() }}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('all')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-user"></i>
        </a>
      </li>
    </ul>
                   
  </nav>
</div>

 
      