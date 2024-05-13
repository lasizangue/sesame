<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- Fonts -->
    
     <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonyme" > 

    <!-- Scripts -->
    @include('livewire.ordres.entete')
   
</head>
<body>
    <div class="row p-1 pt-0">
             
             @if ($dossier->typeChargement=="TC Plein")
                @if ($dossier->acconier->nomAcconier=="AGL" || $dossier->acconier->nomAcconier=="Delmas")
                    @include('livewire.ordres.agl')
                @else
                    @include('livewire.ordres.tcimport')
                @endif  
              @endif
              @if ($dossier->typeChargement=="Degroupage")
                  @include('livewire.ordres.dgp')
              @endif
         
    </div>
   @if ($dossier->acconier->nomAcconier=="AGL" || $dossier->acconier->nomAcconier=="Delmas")
   
   @else
        <footer>
            
            <font size="1">{{$dateHeureActu}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : <b>dept.livraison@tgr-ci.com</b></font>
            
        </footer>
        @endif
   

  </body> 
</html>

