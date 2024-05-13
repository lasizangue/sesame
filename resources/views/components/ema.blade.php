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
                    <p class="text-primary">Gestion des dossiers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ouv.ouverture.cliens.index')}}"
                        class="nav-link  {{setMenuClass('ouv.ouverture.cliens.index', 'active')}}">
                    <i class="nav-icon fas fa-edit text-primary"></i>
                    <p class="text-primary">Table des clients</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{setMenuClass('ema.cotation.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('ema.cotation.', 'active')}}">
                <i class="fab fa-creative-commons-by fa-lg fa-2x"></i>
                <p>
                Cotations
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('ema.cotation.cotations.index')}}"
                        class="nav-link {{setMenuClass('ema.cotation.cotations.index', 'active')}}">
                    <i class="fas fa-external-link-alt text-primary"></i>
                    <p class="text-primary">Cotation & modification</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ema.cotation.cotannuls.index')}}"
                        class="nav-link {{setMenuClass('ema.cotation.cotannuls.index', 'active')}}">
                    <i class="fas fa-ban text-primary"></i>
                    <p class="text-primary">Annulation</p>
                    </a>
                </li>
              </ul>
           </li>

           <li class="nav-item {{setMenuClass('ema.validation.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('ema.validation.', 'active')}}">
               <i class="fas fa-check-double fa-lg"></i>
                <p>
                Validation
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('ema.validation.valids.index')}}"
                        class="nav-link {{setMenuClass('ema.validation.valids.index', 'active')}}">
                    <i class="fas fa-check text-primary"></i>
                    <p class="text-primary">Validation & modification</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ema.validation.anvalids.annul')}}"
                        class="nav-link {{setMenuClass('ema.validation.anvalids.annul', 'active')}}">
                   <i class="fas fa-ban text-primary"></i>
                    <p class="text-primary">Annulation</p>
                    </a>
                </li>
             </ul>
         </li>
