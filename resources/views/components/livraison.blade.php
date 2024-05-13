 {{--<li class="nav-item {{setMenuClass('ouv.ouverture.', 'menu-open')}}">
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
         </li>--}}

           <li class="nav-item {{setMenuClass('liv.livraison.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('liv.livraison.', 'active')}}">
               <i class="fas fa-truck fa-lg"></i>
                <p>
                Livraison
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('liv.livraison.bordereaux.index')}}"
                        class="nav-link {{setMenuClass('liv.livraison.bordereaux.index', 'active')}}">
                    <i class="fas fa-dolly-flatbed text-primary"></i>
                    <p class="text-primary">Livraison & modification</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('liv.livraison.ordres.index')}}"
                        class="nav-link {{setMenuClass('liv.livraison.ordres.index', 'active')}}">
                   <i class="fab fa-first-order text-primary"></i>
                    <p class="text-primary">Ordre -bordereau</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{route('liv.livraison.conteneurs.index')}}"
                        class="nav-link {{setMenuClass('liv.livraison.conteneurs.index', 'active')}}">
                    <i class="fas fa-boxes text-primary"></i>
                    <p class="text-primary">Gestion des conteneurs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('liv.livraison.transporteurs.index')}}"
                        class="nav-link {{setMenuClass('liv.livraison.transporteurs.index', 'active')}}">
                    
                    <i class="fas fa-dolly text-primary"></i>
                    <p class="text-primary">Table des transporteurs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('liv.livraison.compagnies.index')}}"
                        class="nav-link {{setMenuClass('liv.livraison.compagnies.index', 'active')}}">
                    <i class="far fa-building text-primary"></i>
                    <p class="text-primary">Table des compagnies</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('acconier.index')}}"
                        class="nav-link {{setMenuClass('acconier.index', 'active')}}">
                    <i class="fas fa-warehouse text-primary"></i>
                    <p class="text-primary">Table des acconiers</p>
                    </a>
                </li>
              </ul>
           </li>

           