
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- Fonts -->
    
     <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonyme" > 

    <!-- Scripts -->
   
</head>
<body>
<div class="row p-2 pt-5">
        <div class="card">
            <div class="card-header bg-success">
                <h1 >Liste des dossiers validés</h1>
           </div>
         <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="width:8%">N°Dossier</th>
                    <th style="width:8%" >Client</th>
                    <th style="width:8%" >Déclaration</th>
                    <th style="width:8%" >Liquidation</th>
                    <th style="width:8%" >Montant</th>
                    <th style="width:4%" >Circuit</th>
                    <th style="width:15%" class="text-center" >Validé le</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($dossiers as $dossier)
                <tr>
                    <td>{{$dossier->numDossier}}</td>
                    <td>{{$dossier->client->raisonSocial ?? 'Code not found'}}</td>
                    <td>{{$dossier->numDeclaration}}</td>
                    <td>{{$dossier->numLiquidation}}</td>
                    <td>{{$dossier->montanDeclaration}}</td>
                    <td>{{$dossier->circuit}}</td>
                    <td class="text-center">{{Carbon\Carbon::parse($dossier->dateValidation)->format('d-m-Y') }}</td>
                    
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
         
</html>

