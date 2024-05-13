<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- Fonts -->
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin ="anonyme"><link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonyme"> 

    <!-- Scripts -->
   
</head>
<body>

<div class="row p-4 pt-5">
    <div class="col-12">
     <div><h1>Liste des clients</h1></div>
        <div class="card">
          <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table  class="table table-bordered">
                <thead>
                    <tr>

                        <th style="width:30%">Désignation</th>
                        <th style="width:30%" >N°C.contribuable</th>
                        <th style="width:20% ">Adresse</th> 
                        <th style="width:20%" >Contact</th>
                    
                    
                    </tr>
                </thead>
              <tbody>
                @foreach($clients as $client)
                <tr>
                    <td >{{$client->raisonSocial}}</td>
                    <td>{{$client->compteContrib}}</td>
                    <td>{{$client->adresse}}</td>
                    <td>{{$client->contact}}</td>
                    
                </tr>
                @endforeach

              </tbody>
                
            </table>
                <div>
                    <div>Imprimé le : {{$dateHeureActu->toDateString()}} à {{$dateHeureActu->toTimeString()}}</div>  
                </div>
        </div>
            
        </div>
            
    </div>
    </div>
    <script type="text/php">
    if (isset($pdf)) {
        $x = 250;
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
         
</html>

