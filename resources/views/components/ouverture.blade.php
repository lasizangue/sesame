<li class="nav-item {{setMenuClass('ouv.ouverture.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('ouv.ouverture.', 'active')}}">
                <i class="fas fa-folder-open fa-lg"></i>
                <p>
                Ouverture
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('ouv.ouverture.dossiers.index')}}"
                        class="nav-link {{setMenuClass('ouv.ouverture.dossiers.index', 'active')}}">
                    <i class="nav-icon fas fa-folder-plus text-primary"></i>
                    <p class="text-primary">Gestion des  dossiers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ouv.ouverture.cliens.index')}}"
                        class="nav-link {{setMenuClass('ouv.ouverture.cliens.index', 'active')}}">
                    <i class="nav-icon fas fa-edit text-primary"></i>
                    <p class="text-primary">Table des clients</p>
                    </a>
                </li>
            </ul>
        </li>
