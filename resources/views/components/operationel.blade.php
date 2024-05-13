<li class="nav-item {{setMenuClass('opera.operationnel.', 'menu-open')}}">
            <a href="#" class="nav-link {{setMenuClass('opera.operationnel.', 'active')}}">
                <i class="fas fa-briefcase fa-lg"></i>
                <p>
                Opérationnel
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('opera.operationnel.passages.index')}}"
                        class="nav-link {{setMenuClass('opera.operationnel.passages.index', 'active')}}">
                    <i class="fas fa-calendar-check text-primary"></i>
                    <p class="text-primary">Procédure de passage</p>
                    </a>
                </li>
                
              </ul>
           </li>
            