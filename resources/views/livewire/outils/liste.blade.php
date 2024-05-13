<div class="row p-4 mb-2">
    <div class="col-12"> 
         <div class="card">
            
          <h2 class="ml-5 text-success "> Outils de maintenance</h2>
                  <nav class="navbar navbar-expand navbar-primary navbar-dark">

                        <ul class="navbar-nav">
                              
                              <li class="nav-item d-none d-sm-inline-block">
                                    <a wire:click.prevent='apropos()' class="nav-link btn btn-link">Infos à propos de sesame</a>
                              </li>

                              <li class="nav-item d-none d-sm-inline-block">
                                    <a wire:click.prevent='misePlace()' class="nav-link btn btn-link">Mise en place</a>
                              </li>

                              <li class="nav-item d-none d-sm-inline-block">
                                    <a wire:click.prevent='logActivite()' class="nav-link btn btn-link">Logs</a>
                              </li>
                              
                        </ul>                       
                    </nav>
                        <div class="card-body">
                              @if ($vapro)
                                 @include('livewire.outils.apropos')
                              @endif

                              @if ($vrecup)
                                 @include('livewire.outils.recup')
                              @endif

                              @if ($vlog)
                                 @include('livewire.outils.log')
                              @endif
                              
                        </div>
         </div>
      </div>
</div>

