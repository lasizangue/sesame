<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
<div class="bg-dark">
    <div class="card-body bg-dark box-profile">
        <div class="text-center">
            <img src="{{ Vite::asset('resources/images/user.png') }}" width="80" height="80" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center ellipsis">{{userFullName()}} </h3>

        <p class="text-muted text-center">{{userFonction()}}</p>

        <ul class="list-group bg-dark mb-3">
                
                <li class="list-group-item">
                    <a href="{{ route ('clien.mdps.index') }}" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
                </li>

                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center" data-toggle="modal" data-target="#modalPro"><i class="fa fa-user pr-2"></i><b>Mon profile</b> </a>
                </li>
            
            
     </ul>
                <a class="btn btn-primary btn-block" href="{{ route ('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
                </form>

    </div>
    <!-- /.card-body -->
</div>
</aside>

<x-profile/>


