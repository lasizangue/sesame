<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ setMenuClass('home', 'active') }}">
              <i class="fas fa-home fa-lg"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>

        <li class="nav-item {{setMenuClass('clien.tableau.', 'menu-open')}} ">
            <a href="#" class="nav-link {{setMenuClass('clien.tableau.','active')}} ">
              <i class="fas fa-tachometer-alt fa-lg"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('clien.tableau.vues.index')}}" class="nav-link {{setMenuClass('clien.tableau.vues.index', 'active')}}">
                  <i class="nav-icon fas fa-chart-line text-primary"></i>
                  <p class="text-primary" >Vue globale</p>
                </a>
              </li>
            </ul>
        </li>