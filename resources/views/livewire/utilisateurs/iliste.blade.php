<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- Fonts -->
    
     <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonyme" > 

    <!-- Scripts -->
   
</head>
<body>

<div class="row p-4 pt-5">
    <div class="col-12">
    <h1>Liste des utilisateurs</h1>
        <div class="card">
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table  class="table table-bordered">
            <thead>
                <tr>

                    <th style="width:15%">Mle</th>
                    <th style="width:35%" >Utilisateur</th>
                    <th style="width:23% ">Service</th> 
                    <th style="width:22%" >Détachement</th>
                    <th style="width:5%">Sexe</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->matricule}}</td>
                    <td>{{$user->nom}} {{$user->prenom}}</td>
                    <td>{{$user->service->nomService}}</td>
                    <td>{{$user->detachement->nomDetachement}}</td>
                   
                    <td>
                        @if($user->sexe=="F")
                            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('resources/images/femme.png'))); ?>" width="24" height="24">
                        @endif

                        @if($user->sexe=="M") 
                            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('resources/images/homme.png'))); ?>" width="24" height="24">
                        @endif

                    </td>
                    
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>
            
        </div>
            <div class="card-footer">
                
            </div>
    </div>
    
    </div>
    
    <script type="text/php">
    if (isset($pdf)) {
        $x = 380;
        $y = 10;
        $text = "Page {PAGE_NUM} sur {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(255,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
   </script>
   
    </body>
<div>Imprimé le : {{$dateHeureActu->toDateString()}} à {{$dateHeureActu->toTimeString()}}</div>
</html>



    