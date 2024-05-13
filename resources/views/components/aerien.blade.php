 
           <li class="nav-item {{setMenuClass('aer.aerien.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('aer.aerien.', 'active')}}">
               
               <i class="fas fa-plane fa-lg"></i>
                <p>
                Aérien
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('aer.aerien.saisies.index')}}"
                        class="nav-link {{setMenuClass('aer.aerien.saisies.index', 'active')}}">
                    <i class="fas fa-pen text-primary"></i>
                    <p class="text-primary">Saisie et édition</p>
                    </a>
                </li>
                
              </ul>
           </li>

           