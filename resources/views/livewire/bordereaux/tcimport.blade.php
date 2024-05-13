
            <div class="row p-1 pt-0 mb-0">
                <hr class="mb-0 mt-0" style="border: 1px dashed black;"> 
                   <table  class="table border-top mt-0 mb-0">
                          <tbody>                       
                                <tr>                          
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">N°Déclaration : <b>{{$dossier->numDeclaration}}</b><br/>Date réception : <b>{{Carbon\Carbon::parse($dossier->dateReception)->format('d-m-Y') }}</b><br/>Mode livraison : <b>{{$dossier->modeLivraison}}</b></font></p>
                                          
                                    </td>
                                    <td >
                                          <p class="mb-0 mt-0 ml-1"><font size="1">Nbre TC 20' : <b>{{$dossier->nbreTc20}}</b></font></p>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">Nbre TC 40' : <b>{{$dossier->nbreTc40}}</b></font></p>
                                          
                                    </td>
                                    <td>
                                          <p class="mb-0 mt-0 ml-1"><font size="1">Circuit : <b>{{$dossier->circuit}}</b><br/>Date mise en livraison : <b>@if ($dossier->dateMiseEnLivraison!=null)
                                              {{Carbon\Carbon::parse($dossier->dateMiseEnLivraison)->format('d-m-Y')}}
                                              @else
                                              {{null}}
                                          @endif</b><br/>Transporteur : <b>{{$dossier->transporteur->nomTransporteur}}</b></font></p>
                                          
                                    </td>                                   
                                </tr>                                  
                            </tbody>
                      </table>                                 
                      <hr class="mb-0 mt-0" style="border: 1px dashed black;">
                      <table class="table border-top mb-0 mt-0" >
                            <tr>
                                <td> 
                                     <p><font size="1">N°Dossier : <b>{{$dossier->numDossier}}</b><br/>
                                     Date d'arrivée : <b>{{Carbon\Carbon::parse($dossier->dateNavire)->format('d-m-Y') }}</b><br/>
                                      Connaissement : <b>{{$dossier->connaissement}}</b><br/>
                                      Navire : <b>{{$dossier->navire}}</b><br/>
                                      Port de chargement : <b>{{$dossier->port}}</b></font></p>
                                </td>
                                <td  > 
                                     <p ><font size="1">Client : <br/>
                                        <b>{{$dossier->client->raisonSocial}}</b></font>
                                     </p>
                                </td>
                                <td > 
                                     <p class="mb-0"><font size="1">Compagnie : <br/>
                                        <b>{{$dossier->compagnie->nomCompagnie}}</b></font>
                                     </p>
                                </td>
                            </tr>
                      </table>
                      <hr class="mb-1 mt-0" style="border: 1px dashed black;">
                    <p class="ml-1 mb-1"><b><font size="1">* Messieurs (dames), veuillez nous livrer le(s) conteneur(s) ci-dessous mentionné(s)</font></b></p>

                    <p class="mb-1 ml-1"><font size="1"><b>* {{$dossier->observLivraison}}</b></font></p>
                     <p class="mb-1 ml-1"><font size="1">* Lieu de livraison : <b>{{$dossier->lieu}}</b></font></p>
                    <p class="mb-1 ml-1"><font size="1">* Livraison sur : <b>{{$dossier->modeLivraison}}</b></font></p>
                    
                    <div class="mb-1" style="display: inline-block; width:510px; vertical-align: top;">
                    <p class="mb-0 mt-0 ml-4"><font size="12px"><U>LISTE DES CONTENEURS 20'</U></font></p>
                            @foreach ( $conteneurs as $conteneur)                         
                                @if ($conteneur->typeTc=="Tc 20'")
                                    <p class="mb-0 mt-0 ml-4"><font size="11px"><b>{{$conteneur->numTc}}</b></font></p>     
                                @endif                                                
                            @endforeach
                           <p class="mb-0 mt-1 ml-4"><b><font size="12px"><U>Total TC 20' =</U> {{$countV}}</font></b></p>
                    </div>
                    <div class="mb-1" style="display: inline-block; vertical-align: top;">
                    <p class="mb-0 mt-0 ml-4"><font size="12px"><U>LISTE DES CONTENEURS 40'</U></font></p>
                             @foreach ( $conteneurs as $conteneur)                         
                                @if ($conteneur->typeTc=="Tc 40'")
                                    <p class="mb-0 mt-0 ml-4"><font size="11px"><b>{{$conteneur->numTc}}</b></font></p>     
                                @endif                                                
                             @endforeach
                             <p class="mb-1 mt-1 ml-4"><b><font size="12px"><U>Total TC 40' =</U> {{$countQ}}</font></b></p>      
                    </div>

                    <table  class="table">
                            <tr >
                                <td > 
                                    <b><font size="1">Recevez nos sincères remerciements messieurs (dames)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TGR</font></b>
                                </td><br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>    
                            </tr>
                      </table>
                         
          </div>