
    <div class="row p-1 pt-0 mb-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2">Abidjan, le {{$dateHeureA}}</font>
                   
          <center><p class="mb-0 mt-0" style="border: 1px solid black;"><span ><font size="1"><b>BORDEREAU DE LIVRAISON</b></font></span></p></center>
          <p class="mb-0 ml-1"><font size="1">Messieurs,</font></p>
          <p class="mb-0 ml-1"><font size="1">Merci de bien vouloir livrer la marchandise ci-après désignée ( à remplir par le client) :</font></p>
          <hr class="mb-0 mt-1" style="border: 1px dashed black;">
            <p class="mb-0">Identification</p>
          <hr class="mb-0 mt-0" style="border: 1px dashed black;">
                   <table>
                          <tbody>                       
                                <tr>                          
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">NOM ET ETA DU NAVIRE : <b>{{$dossier->navire}}</b> du <b>{{Carbon\Carbon::parse($dossier->dateNavire)->format('d-m-Y') }}</b></font></p>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">NOMBRE DE TC 20' :<b> {{$dossier->nbreTc20}}</b></font></p>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">NOMBRE DE TC 40' :<b> {{$dossier->nbreTc40}}</b></font></p>
                                    </td>
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">NUMERO DU BL :<b> {{$dossier->connaissement}}</b></font></p>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">NUMERO DE DECLARATION :<b> {{$dossier->numDeclaration}}</b></font></p>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">CIRCUIT :<b> {{$dossier->circuit}}</b></font></p>
                                    </td>                              
                                </tr>                                  
                            </tbody>
                      </table>                                 
                      <hr class="mb-0 mt-1" style="border: 1px dashed black;">
                          <p class="mb-0">Livraison</p>
                      <hr class="mb-1 mt-0" style="border: 1px dashed black;">
                      
                      <div>
                          <div style="display: inline-block; width:650px; vertical-align: top;">
                              <p class="mb-1 mt-0 ml-1"><font size="1">DATE DE DEPOT DE L'ORDRE DE LIVRAISON : <b>{{Carbon\Carbon::parse($dateEnChaine)->format('d-m-Y') }}</b></font></p>
                              <p class="mb-1 mt-0 ml-1"><font size="1">LIEU DE LIVRAISON EXACT (ADRESSE GEOGRAPHIQUE) :<b> {{$dossier->lieu}}</b></font></p>
                              <p class="mb-0 mt-0 ml-1"><font size="1">NOM ET CONTACT DU CLIENT :<b> {{$dossier->client->raisonSocial}} Tél : {{$dossier->client->contact}}</b></font></p>
                          </div>
                          <div style="display: inline-block; vertical-align: top;">
                              <p class="mb-0 mt-0 ml-1"><font size="1">
                                                <input type="checkbox"> BON DE SORTIE   
                                         </font></p>
                                         <p class="mb-0 mt-0 ml-1"><font size="1">
                                                <input type="checkbox"> BADT
                                         </font></p>
                                         <p class="mb-0 mt-0 ml-1"><font size="1">
                                                <input type="checkbox"> DECLARATIONS COMPLETES 
                                         </font></p>
                                         <p class="mb-0 mt-0 ml-1"><font size="1">
                                                <input type="checkbox"> DEMANDE SOUS PALAN 
                                         </font></p>
                                         <p class="mb-0 mt-0 ml-1"><font size="1">
                                                <input type="checkbox"> OUVERTURE AVEC SECURITE
                                         </font></p>
                          
                            </div>
                        </div>
                    <hr class="mb-1 mt-1" style="border: 1px dashed black;">
                          <div style="display: inline-block; width:550px; vertical-align: top;">
                             <p class="mb-0 mt-0 ml-1"><font size="2"><b>Mode de livraison</b></font></p>
                            <p class="mb-0 mt-0 ml-1"><li class="mb-0 mt-0"><font size="1"><b>Cocher les cases repondant à vos exigences</b></font></li></p>
                            <P class="mb-0 mt-0 ml-1"><font size="1">LIVRAISON SUR REMORQUE&nbsp;@if ($dossier->modeLivraison=='REMORQUE')
                                <input type="checkbox" checked>
                                @else
                                <input type="checkbox">
                            @endif &nbsp;&nbsp;LIVRAISON SUR AUTOCHARGEUSE&nbsp;@if ($dossier->modeLivraison=='AUTOCHARGEUSE')
                                <input type="checkbox" checked>
                                @else
                                <input type="checkbox">
                            @endif</font></P>
                            <P class="mb-0 mt-0 ml-1"><font size="1">TRANSFERT AU SCANNER&nbsp;<input type="checkbox">&nbsp;&nbsp;DEPOTAGE A QUAI&nbsp;<input type="checkbox"></font></P>
                          </div>
                          <div style="display: inline-block; vertical-align: top;">
                                        <p class="mb-0 mt-0 ml-1"><font size="1">
                                             <b>Espace à remplir par le transporteur</b>  
                                         </font></p>
                                         <p class="mb-0 mt-0 ml-1"><font size="1">
                                             DELAI DE LIVRAISON POSSIBLE (Nbre jours)........................
                                         </font></p>
                                         <p class="mb-0 mt-0 ml-1"><font size="1">DATE DE RECEPTION DOSSIER :..........................................</font></p>
                                        <p class="mb-0 mt-0 ml-1"><font size="1">DATE VALIDITE BAD................................................................</font></p>
                            </div>
                    <hr class="mb-1 mt-1" style="border: 1px dashed black;">
                        <p class="mb-0 mt-0 ml-1"><font size="1">
                        <b>Capacité de réception par jour</b></font></p>
                        <p class="mb-0 mt-0 ml-1"><li class="mb-0 mt-0"><font size="1"><b>Cocher les cases repondant à vos possibilités de réception</b></font></li></p>
                        <p class="mb-0 mt-0 ml-1"><font size="1">
                        <input type="checkbox">Samedi&nbsp;&nbsp;&nbsp; <input type="checkbox">Dimanche&nbsp;&nbsp;&nbsp; <input type="checkbox">Nuit&nbsp;&nbsp;&nbsp; <input type="checkbox">Jour férié&nbsp;&nbsp;&nbsp;   
                        </font></p>
                    <hr class="mb-1 mt-1" style="border: 1px dashed black;">
                    <div style="display: inline-block; width:510px; vertical-align: top;">
                    <p class="mb-0 mt-0 ml-4"><font size="12px"><U>LISTE DES CONTENEURS 20'</U></font></p>
                            @foreach ( $conteneurs as $conteneur)                         
                                @if ($conteneur->typeTc=="Tc 20'")
                                    <p class="mb-0 mt-0 ml-4"><font size="11px"><b>{{$conteneur->numTc}}</b></font></p>     
                                @endif                                                
                            @endforeach
                           <p class="mb-0 mt-1 ml-4"><b><font size="12px"><U>Total TC 20' =</U> {{$countV}}</font></b></p>
                    </div>
                    <div style="display: inline-block; vertical-align: top;">
                    <p class="mb-0 mt-0 ml-4"><font size="12px"><U>LISTE DES CONTENEURS 40'</U></font></p>
                             @foreach ( $conteneurs as $conteneur)                         
                                @if ($conteneur->typeTc=="Tc 40'")
                                    <p class="mb-0 mt-0 ml-4"><font size="11px"><b>{{$conteneur->numTc}}</b></font></p>     
                                @endif                                                
                             @endforeach
                             <p class="mb-0 mt-1 ml-4"><b><font size="12px"><U>Total TC 40' =</U> {{$countQ}}</font></b></p>      
                    </div>
                    
                        <p class="mb-0 mt-3 ml-1"><b><font size="1"><U>SIGNATURE</U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<U>SIGNATURE ET CACHET DU GUICHET</U></font></b></p>             
        </div>   
  

